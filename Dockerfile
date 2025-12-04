FROM php:8.2-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_MEMORY_LIMIT=-1 \
    NODE_ENV=production \
    APP_ENV=production \
    PORT=8080

# Install everything composer and npm need
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
    build-base \
    unzip \
    openssl \
    ca-certificates

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring exif pcntl bcmath zip gd intl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Copy entire application first
COPY . /var/www/html

# Install PHP packages
RUN composer install --prefer-dist --optimize-autoloader --no-interaction

# Install and build frontend
RUN npm ci --production=false && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Nginx config
RUN rm -f /etc/nginx/conf.d/default.conf
RUN mkdir -p /etc/nginx/conf.d


RUN printf '%s\n' \
 'http {' \
 '    include /etc/nginx/mime.types;' \
 '    default_type application/octet-stream;' \
 '    sendfile on;' \
 '    keepalive_timeout 65;' \
 '' \
 '    server {' \
 '        listen 8080;' \
 '        server_name _;' \
 '        root /var/www/html/public;' \
 '        index index.php index.html;' \
 '        add_header X-Frame-Options "SAMEORIGIN";' \
 '        add_header X-Content-Type-Options "nosniff";' \
 '' \
 '        location / {' \
 '            try_files $uri $uri/ /index.php?$query_string;' \
 '        }' \
 '' \
 '        location ~ \.php$ {' \
 '            include fastcgi_params;' \
 '            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;' \
 '            fastcgi_pass 127.0.0.1:9000;' \
 '            fastcgi_index index.php;' \
 '            fastcgi_buffers 16 16k;' \
 '            fastcgi_buffer_size 32k;' \
 '        }' \
 '' \
 '        location ~ /\.(?!well-known).* { deny all; }' \
 '    }' \
 '}' > /etc/nginx/conf.d/laravel.conf

# Supervisor config
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

EXPOSE 8080

CMD ["/usr/bin/supervisord","-c","/etc/supervisord.conf"]
