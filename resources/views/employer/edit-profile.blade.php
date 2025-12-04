<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-4xl mx-auto relative z-10 px-4 md:px-0 -mt-10">
            <div class="mb-6 md:mb-8">
                <h1 class="text-2xl md:text-3xl font-extrabold text-center mb-2">Edit Profile</h1>
                <p class="text-white/40 text-center text-sm md:text-base">Update your profile information</p>
            </div>

            <form action="/profile" method="POST" enctype="multipart/form-data" class="space-y-4 md:space-y-6">
                @csrf
                @method('PUT')

                <!-- Personal Information Section -->
                <h2 class="text-lg md:text-xl font-bold text-white mb-3 md:mb-4">Personal Information</h2>
                <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-4 md:p-6">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
                        <!-- Profile Picture -->
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <img id="avatar-preview"
                                     src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->first_name . ' ' . $user->last_name) . '&size=128' }}"
                                     alt="Profile Picture"
                                     class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-4 border-white/20" />
                                <label for="avatar" class="absolute bottom-0 right-0 border-4 border-zinc-800 bg-white text-black p-1.5 md:p-2 rounded-full cursor-pointer hover:bg-gray-100 transition">
                                    <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </label>
                            </div>
                            <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden">
                            @error('avatar')
                            <p class="text-red-400 text-xs md:text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Personal Fields -->
                        <div class="flex-1 w-full">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                                <div>
                                    <label for="first_name" class="block text-white/80 text-xs md:text-sm font-medium mb-2">First Name</label>
                                    <input type="text" id="first_name" name="first_name"
                                           value="{{ old('first_name', $user->first_name) }}"
                                           class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('first_name')
                                    <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Last Name</label>
                                    <input type="text" id="last_name" name="last_name"
                                           value="{{ old('last_name', $user->last_name) }}"
                                           class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('last_name')
                                    <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Email</label>
                                    <input type="email" id="email" name="email"
                                           value="{{ old('email', $user->email) }}"
                                           class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('email')
                                    <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Phone</label>
                                    <input type="text" id="phone" name="phone"
                                           value="{{ old('phone', $user->phone) }}"
                                           class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('phone')
                                    <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(Auth::user()->user_type === 'applicant')
                    <h2 class="text-lg md:text-xl font-bold text-white mb-3 md:mb-4">Credentials</h2>
                    <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-4 md:p-6">
                        <div class="space-y-3 md:space-y-4">
                            @php
                                $education = $credentials->where('type', 'education')->first();
                                $certification = $credentials->where('type', 'certification')->first();
                                $experience = $credentials->where('type', 'experience')->first();
                            @endphp

                            <div>
                                <label for="education_title" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Education</label>
                                <input type="text" id="education_title" name="credentials[education][title]"
                                       value="{{ old('credentials.education.title', $education->title ?? '') }}"
                                       placeholder="e.g. Bachelor of Science in Computer Science"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @if($education)
                                    <input type="hidden" name="credentials[education][id]" value="{{ $education->id }}">
                                @endif
                            </div>

                            <div>
                                <label for="certification_title" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Certification</label>
                                <input type="text" id="certification_title" name="credentials[certification][title]"
                                       value="{{ old('credentials.certification.title', $certification->title ?? '') }}"
                                       placeholder="e.g. AWS Certified Developer"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @if($certification)
                                    <input type="hidden" name="credentials[certification][id]" value="{{ $certification->id }}">
                                @endif
                            </div>

                            <div>
                                <label for="experience_title" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Experience</label>
                                <input type="text" id="experience_title" name="credentials[experience][title]"
                                       value="{{ old('credentials.experience.title', $experience->title ?? '') }}"
                                       placeholder="e.g. Software Developer"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @if($experience)
                                    <input type="hidden" name="credentials[experience][id]" value="{{ $experience->id }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- wopya socmeds for appli -->
                    <h2 class="text-lg md:text-xl font-bold text-white mb-3 md:mb-4">Social Media Links</h2>
                    <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-4 md:p-6">
                        <div class="space-y-3 md:space-y-4">
                            <div>
                                <label for="instagram_url" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Instagram</label>
                                <input type="url" id="instagram_url" name="instagram_url"
                                       value="{{ old('instagram_url', Auth::user()->applicant->instagram_url ?? '') }}"
                                       placeholder="https://instagram.com/"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label for="facebook_url" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Facebook</label>
                                <input type="url" id="facebook_url" name="facebook_url"
                                       value="{{ old('facebook_url', Auth::user()->applicant->facebook_url ?? '') }}"
                                       placeholder="https://facebook.com/"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label for="github_url" class="block text-white/80 text-xs md:text-sm font-medium mb-2">GitHub</label>
                                <input type="url" id="github_url" name="github_url"
                                       value="{{ old('github_url', Auth::user()->applicant->github_url ?? '') }}"
                                       placeholder="https://github.com/"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                        </div>
                    </div>
                @endif

                @if(Auth::user()->user_type === 'employer')
                    <h2 class="text-lg md:text-xl font-bold text-white mb-3 md:mb-4">Company Information</h2>
                    <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                            <div>
                                <label for="company_name" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Company Name</label>
                                <input type="text" id="company_name" name="company_name"
                                       value="{{ old('company_name', $employer->company_name ?? '') }}"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('company_name')
                                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="location" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Location</label>
                                <input type="text" id="location" name="location"
                                       value="{{ old('location', $employer->location ?? '') }}"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('location')
                                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- wopya socmed for emp -->
                    <h2 class="text-lg md:text-xl font-bold text-white mb-3 md:mb-4">Social Media Links</h2>
                    <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl p-4 md:p-6">
                        <div class="space-y-3 md:space-y-4">
                            <div>
                                <label for="instagram_url" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Instagram</label>
                                <input type="url" id="instagram_url" name="instagram_url"
                                       value="{{ old('instagram_url', $employer->instagram_url ?? '') }}"
                                       placeholder="https://instagram.com/"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('instagram_url')
                                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="facebook_url" class="block text-white/80 text-xs md:text-sm font-medium mb-2">Facebook</label>
                                <input type="url" id="facebook_url" name="facebook_url"
                                       value="{{ old('facebook_url', $employer->facebook_url ?? '') }}"
                                       placeholder="https://facebook.com/"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('facebook_url')
                                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="github_url" class="block text-white/80 text-xs md:text-sm font-medium mb-2">GitHub</label>
                                <input type="url" id="github_url" name="github_url"
                                       value="{{ old('github_url', $employer->github_url ?? '') }}"
                                       placeholder="https://github.com/"
                                       class="w-full px-3 md:px-4 py-2 md:py-3 text-sm md:text-base bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('github_url')
                                <p class="text-red-400 text-xs md:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 pt-4">
                    <a href="{{ url()->previous() }}" class="px-5 md:px-6 py-2.5 md:py-3 bg-white text-black rounded-lg font-medium text-sm md:text-base hover:bg-gray-100 transition text-center">
                        Cancel
                    </a>

                    <button type="submit" class="px-6 md:px-8 py-2.5 md:py-3 border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 cursor-pointer rounded-lg font-medium text-sm md:text-base transition shadow-lg hover:shadow-xl">
                        Save Changes
                    </button>
                </div>
            </form>
        </section>
    </div>

    <script>
        // for img prev func
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
