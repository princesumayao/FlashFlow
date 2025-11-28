<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-4xl mx-auto relative z-10">
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-center mb-2">Edit Profile</h1>
                <p class="text-white/40 text-center">Update your profile information</p>
            </div>

            <form action="/employer/profile" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Profile Picture Section -->
                <h2 class="text-xl font-bold text-white mb-4">Personal Information</h2>
                <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-6">
                    <div class="flex items-center gap-8">
                        <!-- Profile Picture -->
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <img id="avatar-preview"
                                     src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}"
                                     alt="Profile Picture"
                                     class="w-32 h-32 rounded-full object-cover border-4 border-white/20"
                                     onerror="this.src='https://via.placeholder.com/150/cccccc/969696?text=No+Image'" />
                                <label for="avatar" class="absolute bottom-0 right-0 border-4 border-zinc-800  bg-white text-black p-2 rounded-full cursor-pointer transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </label>
                            </div>
                            <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden">
                            @error('avatar')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Personal Information -->
                        <div class="flex-1">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-white/80 text-sm font-medium mb-2">First Name</label>
                                    <input type="text" id="first_name" name="first_name"
                                           value="{{ old('first_name', $user->first_name) }}"
                                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('first_name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-white/80 text-sm font-medium mb-2">Last Name</label>
                                    <input type="text" id="last_name" name="last_name"
                                           value="{{ old('last_name', $user->last_name) }}"
                                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('last_name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-white/80 text-sm font-medium mb-2">Email</label>
                                    <input type="email" id="email" name="email"
                                           value="{{ old('email', $user->email) }}"
                                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('email')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-white/80 text-sm font-medium mb-2">Phone</label>
                                    <input type="text" id="phone" name="phone"
                                           value="{{ old('phone', $user->phone) }}"
                                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('phone')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Information -->
                <h2 class="text-xl font-bold text-white mb-4">Company Information</h2>
                <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="company_name" class="block text-white/80 text-sm font-medium mb-2">Company Name</label>
                            <input type="text" id="company_name" name="company_name"
                                   value="{{ old('company_name', $employer->company_name) }}"
                                   class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('company_name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-white/80 text-sm font-medium mb-2">Location</label>
                            <input type="text" id="location" name="location"
                                   value="{{ old('location', $employer->location) }}"
                                   class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('location')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <h2 class="text-xl font-bold text-white mb-4">Social Media Links</h2>
                <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-6">

                    <div class="space-y-4">
                        <div>
                            <label for="instagram_url" class="block text-white/80 text-sm font-medium mb-2">Instagram</label>
                            <input type="url" id="instagram_url" name="instagram_url"
                                   value="{{ old('instagram_url', $employer->instagram_url) }}"
                                   placeholder="https://instagram.com/"
                                   class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('instagram_url')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="facebook_url" class="block text-white/80 text-sm font-medium mb-2">Facebook</label>
                            <input type="url" id="facebook_url" name="facebook_url"
                                   value="{{ old('facebook_url', $employer->facebook_url) }}"
                                   placeholder="https://facebook.com/"
                                   class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('facebook_url')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="github_url" class="block text-white/80 text-sm font-medium mb-2">GitHub</label>
                            <input type="url" id="github_url" name="github_url"
                                   value="{{ old('github_url', $employer->github_url) }}"
                                   placeholder="https://github.com/"
                                   class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('github_url')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-4">
                    <a href="/jobs/{{ $employer->id }}"
                       class="px-6 py-3 bg-white text-black  rounded-lg font-medium transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-8 py-3 border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 cursor-pointer rounded-lg font-medium transition shadow-lg">
                        Save Changes
                    </button>
                </div>
            </form>
        </section>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('avatar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layout>
