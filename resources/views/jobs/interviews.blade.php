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
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl md:text-3xl font-extrabold">
                    @if($viewType === 'employer')
                        Interview Approvals
                    @else
                        My Interviews
                    @endif
                </h2>
            </div>

            <div class="space-y-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl md:text-2xl font-bold">Pending Interviews</h2>
                    @if($pendingInterviews->count() > 1)
                        <a href="{{ route('interviews.all', 'pending') }}" class="inline-flex items-center gap-1 md:gap-2 px-3 md:px-6 py-2 text-white font-semibold text-xs md:text-base hover:text-blue-400 transition-colors duration-300 whitespace-nowrap">
                            View More
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    @endif
                </div>
                @forelse($pendingInterviews->take(1) as $interview)
                    <x-interview-card :$interview :viewType="$viewType" />
                @empty
                    <p class="text-white/60 text-sm md:text-base">No pending interviews</p>
                @endforelse

                <div class="mt-10">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl md:text-2xl font-bold">Approved Interviews</h2>
                        @if($approvedInterviews->count() > 1)
                            <a href="{{ route('interviews.all', 'approved') }}" class="inline-flex items-center gap-1 md:gap-2 px-3 md:px-6 py-2 text-white font-semibold text-xs md:text-base hover:text-blue-400 transition-colors duration-300 whitespace-nowrap">
                                View More
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    @forelse($approvedInterviews->take(1) as $interview)
                        <x-interview-card :$interview :viewType="$viewType" />
                    @empty
                        <p class="text-white/60 text-sm md:text-base">No approved interviews</p>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-layout>
