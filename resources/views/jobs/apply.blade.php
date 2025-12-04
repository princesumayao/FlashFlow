<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-30 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-30 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="max-w-xl mx-auto mt-10 md:mt-20 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl p-6 md:p-10 flex flex-col items-center relative z-10 mx-4">
            <div class="w-full mb-6 md:mb-8 p-4 md:p-6 rounded-xl bg-zinc-800/80 border border-zinc-700 shadow flex flex-col gap-2 md:gap-3">
                <div class="flex items-start justify-between gap-2">
                    <h3 class="text-lg md:text-xl font-bold text-white flex-1 min-w-0">
                        {{ $job->title }}
                    </h3>
                    <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-3 py-1 rounded-xl flex-shrink-0">
            {{ $job->type }}
        </span>
                </div>
                <div class="flex items-center gap-2 text-white/60 text-xs md:text-sm">
                    {{ $job->employer->company_name }}
                </div>
                <div class="flex items-center gap-2 text-white/60 text-xs md:text-sm">
                    {{ $job->work_location }}
                </div>
                <div class="mt-2">
        <span class="text-xs md:text-sm text-white/80 font-bold flex items-center gap-1">
            ₱{{ number_format($job->salary_min) }} - ₱{{ number_format($job->salary_max) }}
        </span>
                </div>
            </div>
            <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-center">Submit Your Resume</h2>
            <x-form method="POST" action="{{ route('job.apply.store', $job) }}" enctype="multipart/form-data" class="w-full flex flex-col gap-3 md:gap-4">
                @csrf
                <label class="text-white/80 font-semibold text-sm md:text-base">Upload PDF Resume:</label>
                <input type="file" name="resume" accept="application/pdf" required class="cursor-pointer block w-full text-sm md:text-base text-white bg-zinc-800 rounded-lg p-2 mb-3 md:mb-4"/>
                <textarea name="message" placeholder="Send a Caption (Optional)" class="w-full text-sm md:text-base bg-zinc-800 text-white rounded-lg p-3 min-h-[100px]"></textarea>
                <input type="submit" value="Submit Application" class="cursor-pointer w-full rounded-lg border bg-white text-black font-semibold text-base md:text-lg shadow-lg px-5 md:px-6 py-2.5 md:py-3 transition hover:shadow-xl"/>
            </x-form>
        </div>
    </div>
</x-layout>
