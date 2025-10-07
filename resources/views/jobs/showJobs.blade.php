<x-layout2>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-30 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-30 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="max-w-xl mx-auto mt-20 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-2xl p-10 flex flex-col items-center relative z-10">
            <h2 class="text-3xl font-extrabold mb-4 text-center">Software Developer</h2>

            <div class="flex items-center gap-4 mb-4">
                <span class="text-lg font-bold text-white/90">Salary Range $60k - $90k</span>
            </div>

            <div class="text-base text-white/70 mb-2 text-center">Work Location: Work From Home</div>
            <div class="text-base text-white/70 mb-8 text-center">Full-time</div>

            <div class="flex gap-4 w-full">
                <a href="/jobs/1/apply" class="text-center w-1/2 rounded-lg border bg-white text-black font-semibold text-lg shadow-lg px-6 py-3 transition hover:shadow-xl">
                    Apply Now
                </a>
                <a href="/applicant/home"
                   class="inline-block w-1/2 rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-6 py-3 overflow-hidden transition hover:shadow-xl text-center">
                    Close
                </a>
            </div>

        </div>
    </div>
</x-layout2>
