<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-30 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-30 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="max-w-xl mx-auto mt-10 md:mt-20 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-2xl p-6 md:p-10 flex flex-col items-center relative z-10 mx-4">
            <h2 class="text-2xl md:text-3xl font-extrabold mb-3 md:mb-4 text-center">{{ $job->title }}</h2>

            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4 mb-3 md:mb-4">
                <span class="text-base md:text-lg font-bold text-white/90 text-center">Salary Range ₱{{ number_format($job->salary_min) }} - ₱{{ number_format($job->salary_max) }}</span>
            </div>

            <div class="text-sm md:text-base text-white/70 mb-2 text-center">Work Location: {{ $job->work_location }}</div>
            <div class="text-sm md:text-base text-white/70 mb-6 md:mb-8 text-center">{{ $job->type }}</div>

            @if(Auth::user()->user_type === 'applicant')
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 w-full">
                    <a href="{{ route('job.apply', $job) }}" class="text-center w-full sm:w-1/2 rounded-lg border bg-white text-black font-semibold text-base md:text-lg shadow-lg px-5 md:px-6 py-2.5 md:py-3 transition hover:shadow-xl">
                        Apply Now
                    </a>
                    <a href="{{ url()->previous() }}" class="inline-block w-full sm:w-1/2 rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-sm md:text-base shadow-lg px-5 md:px-6 py-2.5 md:py-3 overflow-hidden transition hover:shadow-xl text-center">
                        Close
                    </a>
                </div>
            @else
                <a href="{{ url()->previous() }}" class="inline-block w-full rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-sm md:text-base shadow-lg px-5 md:px-6 py-2.5 md:py-3 overflow-hidden transition hover:shadow-xl text-center">
                    Close
                </a>
            @endif
        </div>
    </div>
</x-layout>
