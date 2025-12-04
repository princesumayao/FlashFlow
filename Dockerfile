# dockerfile
FROM php:8.1-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    NODE_ENV=production \
    APP_ENV=production \
    PORT=8080

# Install system dependencies, php extensions build deps, nginx and supervisor
RUN apk add --no-cache \
    bash \
    git \
    curl \
    nginx \
    supervisor \
    nodejs npm \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    zlib-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    jpeg-dev \
    build-base

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring exif pcntl bcmath zip gd intl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Copy composer files first to leverage caching
COPY composer.json composer.lock /var/www/html/

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Copy package files and build frontend assets
COPY package.json package-lock.json /var/www/html/
RUN npm ci --production \
 && npm run build

# Copy application code
COPY . /var/www/html

# Run composer again to pick up any post-copy autoload changes
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Set permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Nginx config: serve Laravel public folder and forward php to php-fpm on 127.0.0.1:9000
RUN rm /etc/nginx/conf.d/default.conf
RUN printf '%s\n' \
 'server {' \
 '    listen 8080;' \
 '    server_name _;' \
 '    root /var/www/html/public;' \
 '    index index.php index.html;' \
 '    add_header X-Frame-Options "SAMEORIGIN";' \
 '    add_header X-Content-Type-Options "nosniff";' \
 '' \
 '    location / {' \
 '        try_files $uri $uri/ /index.php?$query_string;' \
 '    }' \
 '' \
 '    location ~ \.php$ {' \
 '        include fastcgi_params;' \
 '        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;' \
 '        fastcgi_pass 127.0.0.1:9000;' \
 '        fastcgi_index index.php;' \
 '        fastcgi_buffers 16 16k;' \
 '        fastcgi_buffer_size 32k;' \
 '    }' \
 '' \
 '    location ~ /\.(?!well-known).* { deny all; }' \
 '}' > /etc/nginx/conf.d/laravel.conf

# Supervisor config to run nginx and php-fpm
RUN printf '%s\n' \
 '[supervisord]' \
 'nodaemon=true' \
 '' \
 '[program:php-fpm]' \
 'command=/usr/local/sbin/php-fpm --nodaemonize' \
 'stdout_logfile=/dev/stdout' \
 'stderr_logfile=/dev/stderr' \
 '' \
 '[program:nginx]' \
 'command=/usr/sbin/nginx -g "daemon off;"' \
 'stdout_logfile=/dev/stdout' \
 'stderr_logfile=/dev/stderr' \
 > /etc/supervisord.conf

# Expose port for Render (match this in Render service settings)
EXPOSE 8080

# Healthcheck (optional)
HEALTHCHECK --interval=30s --timeout=3s CMD wget -qO- http://localhost:8080/ || exit 1

# Final command
CMD ["/usr/bin/supervisord","-c","/etc/supervisord.conf"]
