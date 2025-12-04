@props(['job'])
<a href="{{ route('job.show', $job) }}" class="block">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between p-6 md:p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group gap-4">
        <div class="flex-1">
            <h4 class="text-xl md:text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">{{ $job->title }}</h4>
            <div class="text-sm md:text-base text-white/70 mt-1 italic line-clamp-2">"{{ $job->description }}"</div>
            <div class="text-base md:text-lg text-white/70 mt-1">{{ $job->employer->company_name }} &middot; {{ $job->location }}</div>
        </div>
        <div class="flex flex-col items-start md:items-end gap-2 w-full md:w-auto">
            <div class="flex gap-2 flex-wrap">
                <span class="bg-blue-800/10 text-blue-800 text-sm md:text-base font-semibold px-3 md:px-4 py-1.5 md:py-2 rounded">{{ $job->type }}</span>
                <span class="{{ $job->work_location === 'Work From Home' ? 'bg-green-800/10 text-green-800' : 'bg-yellow-800/10 text-yellow-800' }} text-sm md:text-base font-semibold px-3 md:px-4 py-1.5 md:py-2 rounded">{{ $job->work_location }}</span>
            </div>
            <span class="text-base md:text-lg text-white/80 font-semibold">₱{{ number_format($job->salary_min) }} - ₱{{ number_format($job->salary_max) }}</span>
        </div>
    </div>
</a>
