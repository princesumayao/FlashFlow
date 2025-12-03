<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-30 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-30 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="max-w-xl mx-auto mt-20 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl p-10 flex flex-col items-center relative z-10">
            <div class="w-full mb-8 p-6 rounded-xl bg-zinc-800/80 border border-zinc-700 shadow flex flex-col gap-3">
                <h3 class="text-xl font-bold text-white mb-1 flex items-center gap-2">
                    {{ $job->title }}
                </h3>
                <div class="flex items-center gap-2 text-white/60 text-sm">
                    {{ $job->employer->company_name }}
                </div>
                <div class="flex items-center gap-2 text-white/60 text-sm">
                    {{ $job->work_location }}
                </div>
                <div class="flex items-center gap-3 mt-2">
                <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-3 py-1 rounded-xl flex items-center gap-1">
                {{ $job->type }}
                </span>
                    <span class="text-sm text-white/80 font-bold flex items-center gap-1">
                ₱{{ number_format($job->salary_min) }} - ₱{{ number_format($job->salary_max) }}
                </span>
                </div>
            </div>

            <h2 class="text-2xl font-bold mb-6 text-center">Submit Your Resume</h2>
            <form method="POST" action="{{ route('job.apply.store', $job) }}" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
                @csrf
                <label class="text-white/80 font-semibold">Upload PDF Resume:</label>
                <input type="file" name="resume" accept="application/pdf" required class="cursor-pointer block w-full text-white bg-zinc-800 rounded-lg p-2 mb-4"/>
                <textarea name="message" placeholder="Sent a Caption (Optional)" class="w-full bg-zinc-800 text-white rounded-lg p-3 min-h-[100px]"></textarea>
                <input type="submit" value="Submit Application" class="cursor-pointer w-full rounded-lg border bg-white text-black font-semibold text-lg shadow-lg px-6 py-3 transition hover:shadow-xl"/>
            </form>

        </div>
    </div>
</x-layout>
