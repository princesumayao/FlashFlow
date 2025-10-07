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
                            <h2 class="text-2xl font-bold text-white">Mark Taway</h2>
                            <div class="text-blue-200 text-lg">Pili Company</div>
                            <div class="text-white/60 text-sm">Naga City</div>
                            <div class="text-white/60 text-sm mb-2">pilicompany@gmail.com</div>
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
            <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">Frontend Developer</h3>
                        <div class="mt-2 text-lg text-white/80">Pili Company</div>
                        <div class="text-sm text-white/50">Naga City</div>
                    </div>

                    <div class="flex flex-col items-end ml-4">
                        <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                        <span class="text-lg font-bold text-white/90 mb-2">$60k - $90k</span>
                    </div>
                </div>

                <div class="my-4 border-t border-white/10"></div>

                <div class="text-base text-white/70">
                    Full-time work (8 hours/day) at $2.73/hour ($480.00/month)
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-white/40">Posted 3 days ago</span>
                    <div class="flex gap-2">
                        <a href="/jobs/1/edit"
                           class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 overflow-hidden transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Edit
                        </a>
                        <form action="/jobs/1" method="POST" onsubmit="return confirm('Delete this job?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="cursor-pointer inline-flex items-center gap-2 rounded-lg border bg-white text-black font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:bg-gray-100 hover:text-black hover:border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">Frontend Developer</h3>
                        <div class="mt-2 text-lg text-white/80">Pili Company</div>
                        <div class="text-sm text-white/50">Naga City</div>
                    </div>
                    <div class="flex flex-col items-end ml-4">
                        <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                        <span class="text-lg font-bold text-white/90 mb-2">$60k - $90k</span>
                    </div>
                </div>
                <div class="my-4 border-t border-white/10"></div>
                <div class="text-base text-white/70">
                    Basic knowledge of UI/UX design principles
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-white/40">Posted 3 days ago</span>
                    <div class="flex gap-2">
                        <a href="/jobs/1/edit"
                           class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 overflow-hidden transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Edit
                        </a>
                        <form action="/jobs/1" method="POST" onsubmit="return confirm('Delete this job?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="cursor-pointer inline-flex items-center gap-2 rounded-lg border bg-white text-black font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:bg-gray-100 hover:text-black hover:border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">Frontend Developer</h3>
                        <div class="mt-2 text-lg text-white/80">Pili Company</div>
                        <div class="text-sm text-white/50">Naga City</div>
                    </div>
                    <div class="flex flex-col items-end ml-4">
                        <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                        <span class="text-lg font-bold text-white/90 mb-2">$60k - $90k</span>
                    </div>
                </div>
                <div class="my-4 border-t border-white/10"></div>
                <div class="text-base text-white/70">
                    Strong understanding of responsive web design and cross-browser compatibility
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-white/40">Posted 3 days ago</span>
                    <div class="flex gap-2">
                        <a href="/jobs/1/edit"
                           class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 overflow-hidden transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Edit
                        </a>
                        <form action="/jobs/1" method="POST" onsubmit="return confirm('Delete this job?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="cursor-pointer inline-flex items-center gap-2 rounded-lg border bg-white text-black font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:bg-gray-100 hover:text-black hover:border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
</x-layout>
