<x-layout2>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-extrabold">My Interviews</h2>
            </div>

            <div class="space-y-6">
                <h2 class="text-2xl font-bold mb-4">Pending Application</h2>
                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold text-white group-hover:text-blue-500 transition-colors duration-300">
                                Kenji Umpad Turiano
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Company: Omsim Corp</div>
                            <div class="text-sm text-white/50">Iriga City</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Pending</span>
                            <span class="text-lg font-bold text-white/90 mb-2">Submitted 2 days ago</span>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold mb-4">Approved Application</h2>

                    <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-2xl font-extrabold text-white group-hover:text-green-400 transition-colors duration-300">
                                    Maria D. Magiba
                                </h3>
                                <div class="mt-2 text-lg text-white/80">Company: Magiba Corp</div>
                                <div class="text-sm text-white/50">Naga City</div>
                            </div>
                            <div class="flex flex-col items-end ml-4">
                                <span class="bg-green-800/20 text-green-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Approved</span>
                                <span class="text-lg font-bold text-white/90 mb-2">Approved 1 day ago</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout2>
