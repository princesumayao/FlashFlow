<section class="text-center pt-6 px-4 md:px-0">
    <h1 class="font-bold text-3xl md:text-6xl">Where Talent Meets Opportunity.</h1>
    <p class="mt-3 text-sm md:text-lg text-white/40 max-w-3xl mx-auto text-center">
        Your career starts with one click. Explore opportunities that match your passion and skills, and take the next step toward your dream job. Let us connect you with the future you deserve.
    </p>

    <x-form action="/search" method="GET" class="mt-6 md:mt-10 flex justify-center px-4">
        <div class="relative w-full max-w-md">
            <span class="absolute inset-y-0 left-3 flex items-center text-white/30">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 md:size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </span>
            <input type="text" name="q" placeholder="Software Developer" class="w-full px-5 py-2 md:py-3 pl-10 pr-10 text-sm md:text-base rounded-xl bg-gradient-to-b from-white/10 via-zinc-black to-black text-white/80 placeholder-white/30 border border-white/5 focus:outline-none focus:ring-2 focus:ring-white/20 transition"/>
            <span class="absolute inset-y-0 right-3 flex items-center text-white/30 font-bold text-base md:text-lg pointer-events-none select-none">S</span>
        </div>
    </x-form>

    <x-marquee />
</section>
