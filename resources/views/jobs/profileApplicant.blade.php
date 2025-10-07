<x-layout2>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt=""
             class="fixed left-20 top-1/2 -translate-y-2/3 w-110 h-auto object-contain pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt=""
             class="fixed right-20 top-2/3 -translate-y-1/2 w-110 h-auto object-contain pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10">
            <div class="flex justify-center">
                <div class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl shadow-xl border border-zinc-700 w-full max-w-xl flex flex-col">
                    <div class="flex items-center justify-between p-6">
                        <div class="flex items-center gap-6">
                            <img src="https://image.tmdb.org/t/p/original/pm462TGFWVHJOJG2NJyLXGINWQq.jpg"
                                 alt="Applicant Avatar"
                                 class="w-20 h-20 rounded-full object-cover" />
                            <div>
                                <div class="text-white text-lg font-semibold">Prince Sumayao</div>
                                <div class="text-white/60 text-sm">prince_sumayao@gmail.com</div>
                                <div class="text-white/60 text-sm">09193979769</div>
                            </div>
                        </div>
                        <a href="/applicant/profile/edit"
                           class="inline-flex items-center gap-2 px-4 py-2 bg-white text-black rounded-lg font-semibold border shadow hover:bg-gray-100 transition">
                            Edit Profile
                        </a>
                    </div>

                    <div class="border-t border-white/10 mx-6"></div>

                    <div class="p-6">
                        <h3 class="text-white text-md font-bold mb-2">Credentials</h3>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-3 bg-zinc-800/80 rounded-xl px-4 py-3 border border-zinc-700 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                                <div>
                                    <div class="text-white font-semibold text-sm">Bachelor of Science in Information Technology</div>
                                    <div class="text-white/60 text-xs">Camarines Sur, Polytechnic College</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 bg-zinc-800/80 rounded-xl px-4 py-3 border border-zinc-700 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>

                                <div>
                                    <div class="text-white font-semibold text-sm">Certified PHP Developer</div>
                                    <div class="text-white/60 text-xs">Issued by PHP Institute, 2024</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 bg-zinc-800/80 rounded-xl px-4 py-3 border border-zinc-700 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
                                <div>
                                    <div class="text-white font-semibold text-sm">JavaScript Specialist</div>
                                    <div class="text-white/60 text-xs">Coursera, 2022</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-white/10 mx-6"></div>

                    <div class="flex gap-4 justify-center p-4">
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
        </section>
    </div>
</x-layout2>
