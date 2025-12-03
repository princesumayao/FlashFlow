<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10">
            <div class="mb-8">
                <a href="/jobs/{{ $employer->id }}" class="inline-flex items-center gap-2 text-white/70 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to Profile
                </a>
                <h1 class="font-bold text-4xl mt-4">All Jobs from {{ $employer->company_name }}</h1>
            </div>

            <div class="space-y-6">
                @forelse($jobs as $job)
                    <x-job-card :$job />
                @empty
                    <p class="text-white/60">No jobs posted yet</p>
                @endforelse
            </div>
        </section>
    </div>
</x-layout>
