@props(['job'])

<div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
    <div class="flex justify-between items-start">
        <div>
            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                {{ $job->title }}
            </h3>
            <div class="mt-2 text-lg text-white/80">{{ $job->employer->company_name }}</div>
            <div class="text-sm text-white/50">{{ $job->location }}</div>
        </div>
        <div class="flex flex-col items-end ml-4">
            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">{{ $job->type }}</span>
            <span class="{{ $job->work_location === 'Work From Home' ? 'bg-green-800/20 text-green-400' : 'bg-yellow-800/20 text-yellow-400' }} text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">{{$job->work_location}}</span>
            <span class="text-lg font-bold text-white/90 mb-2">₱{{ number_format($job->salary_min) }} - ₱{{ number_format($job->salary_max) }}</span>
        </div>
    </div>
    <div class="my-4 border-t border-white/10"></div>
    <div class="text-base text-white/70 italic">
        "{{ $job->description }}"
    </div>
    <div class="mt-4 text-xs text-white/40">
        Posted {{ $job->created_at->diffForHumans() }}
    </div>
</div>
