<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10 px-4 md:px-0 -mt-10">
            <div class="mb-8">
                <a href="/interviews" class="inline-flex items-center gap-2 text-white/70 hover:text-white transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to Interviews
                </a>
                <h1 class="font-bold text-2xl md:text-4xl mt-4">
                    All {{ ucfirst($type) }} Interviews
                </h1>
            </div>

            <div class="space-y-6">
                @forelse($interviews as $interview)
                    <x-interview-card :$interview :viewType="$viewType" />
                @empty
                    <p class="text-white/60 text-sm md:text-base">No {{ $type }} interviews found</p>
                @endforelse
            </div>
        </section>
    </div>
</x-layout>
