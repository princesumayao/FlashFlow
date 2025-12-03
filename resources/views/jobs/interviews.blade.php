<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-extrabold">
                    @if($viewType === 'employer')
                        Interview Approvals
                    @else
                        My Interviews
                    @endif
                </h2>
            </div>

            <div class="space-y-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold">Pending Interviews</h2>
                    @if($pendingInterviews->count() > 1)
                        <a href="{{ route('interviews.all', 'pending') }}"
                           class="inline-flex items-center gap-2 px-6 py-2.5 text-white font-semibold">
                            View More
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    @endif
                </div>
                @forelse($pendingInterviews->take(1) as $interview)
                    <x-interview-card :$interview :viewType="$viewType" />
                @empty
                    <p class="text-white/60">No pending interviews</p>
                @endforelse

                <div class="mt-10">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Approved Interviews</h2>
                        @if($approvedInterviews->count() > 1)
                            <a href="{{ route('interviews.all', 'approved') }}"
                               class="inline-flex items-center gap-2 px-6 py-2.5 text-white font-semibold">
                                View More
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    @forelse($approvedInterviews->take(1) as $interview)
                        <x-interview-card :$interview :viewType="$viewType" />
                    @empty
                        <p class="text-white/60">No approved interviews</p>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-layout>
