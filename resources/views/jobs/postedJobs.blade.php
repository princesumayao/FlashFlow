<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10">
            <div class="flex justify-center">
                <div class="flex items-start justify-between gap-6 p-6 mb-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl w-full max-w-xl">
                    <div class="flex items-center gap-6">
                        <img src="https://image.tmdb.org/t/p/original/pm462TGFWVHJOJG2NJyLXGINWQq.jpg" alt="Employer Avatar" class="w-20 h-20 rounded-full object-cover" />
                        <div>
                            <h2 class="text-2xl font-bold text-white">{{ $employer->user->first_name }} {{ $employer->user->last_name }}</h2>
                            <div class="text-blue-200 text-lg">{{ $employer->company_name }}</div>
                            <div class="text-white/60 text-sm">{{ $employer->location }}</div>
                            <div class="text-white/60 text-sm mb-2">{{ $employer->user->email }}</div>
                            <div class="flex gap-2 mt-2">
                                <a href="https://instagram.com/" target="_blank" class="rounded-full bg-white/10 hover:bg-pink-500/80 text-white p-2 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect width="18" height="18" x="3" y="3" rx="5" stroke-width="2"/>
                                        <circle cx="12" cy="12" r="4" stroke-width="2"/>
                                        <circle cx="17" cy="7" r="1.5" fill="currentColor"/>
                                    </svg>
                                </a>
                                <a href="https://facebook.com/" target="_blank" class="rounded-full bg-white/10 hover:bg-blue-600/80 text-white p-2 transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M22 12a10 10 0 1 0-11.5 9.95v-7.05h-2v-2.9h2v-2.2c0-2 1.2-3.1 3-3.1.9 0 1.8.16 1.8.16v2h-1c-1 0-1.3.62-1.3 1.25v1.9h2.5l-.4 2.9h-2.1v7.05A10 10 0 0 0 22 12"/>
                                    </svg>
                                </a>

                                <a href="https://github.com/" target="_blank" class="rounded-full bg-white/10 hover:bg-gray-700/80 text-white p-2 transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.58 2 12.26c0 4.5 2.87 8.32 6.84 9.67.5.09.68-.22.68-.48 0-.24-.01-.87-.01-1.7-2.78.62-3.37-1.36-3.37-1.36-.45-1.18-1.1-1.5-1.1-1.5-.9-.63.07-.62.07-.62 1 .07 1.53 1.05 1.53 1.05.89 1.56 2.34 1.11 2.91.85.09-.66.35-1.11.63-1.37-2.22-.26-4.56-1.14-4.56-5.07 0-1.12.38-2.03 1-2.75-.1-.26-.44-1.3.1-2.7 0 0 .83-.27 2.75 1.02A9.3 9.3 0 0 1 12 6.84c.84.004 1.68.11 2.47.32 1.92-1.29 2.75-1.02 2.75-1.02.54 1.4.2 2.44.1 2.7.62.72 1 1.63 1 2.75 0 3.94-2.34 4.8-4.57 5.06.36.32.68.94.68 1.9 0 1.37-.01 2.47-.01 2.8 0 .27.18.58.69.48A10.01 10.01 0 0 0 22 12.26C22 6.58 17.52 2 12 2z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="/employer/profile/edit"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-white text-black rounded-lg font-semibold border shadow hover:bg-gray-100 hover:text-black hover:border-gray-300 transition self-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>

        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-extrabold">Your Jobs</h2>
        </div>

            <div class="space-y-6">
                @foreach($jobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>

    </div>
</x-layout>
