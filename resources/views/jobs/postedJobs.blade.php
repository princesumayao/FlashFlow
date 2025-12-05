<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        @if (session('success'))
            <div class="fixed bottom-6 right-6 z-50 w-full max-w-sm px-4 animate-fade-in">
                <div class="bg-green-900/80 backdrop-blur-sm border border-green-700/50 text-green-100 px-5 py-4 rounded-lg shadow-xl">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="font-semibold text-sm mb-1 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Success
                            </p>
                            <p class="text-xs">{{ session('success') }}</p>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.parentElement.remove()" class="text-green-300 hover:text-green-100 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <section class="pt-4 max-w-5xl mx-auto relative z-10 px-4 md:px-0 -mt-10">
            <div class="flex justify-center mb-8">
                <div class="flex flex-col md:flex-row items-start justify-between gap-4 md:gap-6 p-4 md:p-6 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl w-full max-w-xl">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-4 w-full md:w-auto">
                        <img src="{{ $employer->user->avatar ? asset('storage/' . $employer->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($employer->user->first_name . ' ' . $employer->user->last_name) . '&size=128' }}"
                             alt="Profile Picture"
                             class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-white/20" />
                        <div class="text-center md:text-left w-full md:w-auto">
                            <h2 class="text-xl md:text-2xl font-bold text-white">{{ $employer->user->first_name }} {{ $employer->user->last_name }}</h2>
                            <div class="text-blue-200 text-base md:text-lg">{{ $employer->company_name }}</div>
                            <div class="text-white/60 text-sm">{{ $employer->location }}</div>
                            <div class="text-white/60 text-sm mb-2">{{ $employer->user->email }}</div>

                            <div class="flex gap-2 mt-2 justify-center md:justify-start flex-wrap">
                                @if($employer->instagram_url)
                                    <a href="{{ $employer->instagram_url }}" target="_blank" class="rounded-full bg-white/10 hover:bg-pink-500/80 text-white p-2 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect width="18" height="18" x="3" y="3" rx="5" stroke-width="2"/>
                                            <circle cx="12" cy="12" r="4" stroke-width="2"/>
                                            <circle cx="17" cy="7" r="1.5" fill="currentColor"/>
                                        </svg>
                                    </a>
                                @endif

                                @if($employer->facebook_url)
                                    <a href="{{ $employer->facebook_url }}" target="_blank" class="rounded-full bg-white/10 hover:bg-blue-600/80 text-white p-2 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22 12a10 10 0 1 0-11.5 9.95v-7.05h-2v-2.9h2v-2.2c0-2 1.2-3.1 3-3.1.9 0 1.8.16 1.8.16v2h-1c-1 0-1.3.62-1.3 1.25v1.9h2.5l-.4 2.9h-2.1v7.05A10 10 0 0 0 22 12"/>
                                        </svg>
                                    </a>
                                @endif

                                @if($employer->github_url)
                                    <a href="{{ $employer->github_url }}" target="_blank" class="rounded-full bg-white/10 hover:bg-gray-700/80 text-white p-2 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.58 2 12.26c0 4.5 2.87 8.32 6.84 9.67.5.09.68-.22.68-.48 0-.24-.01-.87-.01-1.7-2.78.62-3.37-1.36-3.37-1.36-.45-1.18-1.1-1.5-1.1-1.5-.9-.63.07-.62.07-.62 1 .07 1.53 1.05 1.53 1.05.89 1.56 2.34 1.11 2.91.85.09-.66.35-1.11.63-1.37-2.22-.26-4.56-1.14-4.56-5.07 0-1.12.38-2.03 1-2.75-.1-.26-.44-1.3.1-2.7 0 0 .83-.27 2.75 1.02A9.3 9.3 0 0 1 12 6.84c.84.004 1.68.11 2.47.32 1.92-1.29 2.75-1.02 2.75-1.02.54 1.4.2 2.44.1 2.7.62.72 1 1.63 1 2.75 0 3.94-2.34 4.8-4.57 5.06.36.32.68.94.68 1.9 0 1.37-.01 2.47-.01 2.8 0 .27.18.58.69.48A10.01 10.01 0 0 0 22 12.26C22 6.58 17.52 2 12 2z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <a href="/profile/edit" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-white text-black rounded-lg font-semibold border shadow hover:bg-gray-100 hover:text-black hover:border-gray-300 transition w-full md:w-auto md:self-start text-sm md:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl md:text-3xl font-extrabold">Your Jobs</h2>
                @if($jobs->count() > 1)
                    <a href="{{ route('jobs.all', $employer->id) }}" class="inline-flex items-center gap-1 md:gap-2 px-3 md:px-6 py-2 text-white font-semibold text-xs md:text-base hover:text-blue-400 transition-colors duration-300 whitespace-nowrap">
                        View More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                @endif
            </div>

            @if($jobs->isEmpty())
                <div class="text-center py-12">
                    <p class="text-white/40 text-lg mb-4">You haven't posted any jobs yet.</p>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($jobs->take(2) as $job)
                        <x-job-card :$job />
                    @endforeach
                </div>
            @endif
        </section>

    </div>
</x-layout>
