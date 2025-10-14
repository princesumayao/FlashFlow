@props(['title', 'description', 'company', 'location', 'type', 'workLocation', 'salary'])

<div class="flex items-center justify-between p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
    <div>
        <h4 class="text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">{{ $title }}</h4>
        <div class="text-base text-white/70 mt-1 italic">"{{ $description }}"</div>
        <div class="text-lg text-white/70 mt-1">{{ $company }} &middot; {{ $location }}</div>
    </div>
    <div class="flex flex-col items-end">
        <div class="flex gap-2 mb-2">
            <span class="bg-blue-800/10 text-blue-800 text-base font-semibold px-4 py-2 rounded mb-2">{{ $type }}</span>
            <span class="{{ $workLocation === 'Work From Home' ? 'bg-green-800/10 text-green-800' : 'bg-yellow-800/10 text-yellow-800' }} text-base font-semibold px-4 py-2 rounded mb-2 ml-2">{{ $workLocation }}</span>
        </div>
        <span class="text-lg text-white/80 font-semibold">{{ $salary }}</span>
    </div>
</div>
