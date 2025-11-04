@props(['job'])

<div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
    <div class="flex justify-between items-start">
        <div>
            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">{{ $job->title }}</h3>
            <div class="mt-2 text-lg text-white/80">{{ $job->employer->company_name }}</div>
            <div class="text-sm text-white/50">{{ $job->location }}</div>
        </div>

        <div class="flex flex-col items-end ml-4">
            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">{{ $job->type }}</span>
            <span class="text-lg font-bold text-white/90 mb-2">₱{{ number_format($job->salary_min) }} - ₱{{ number_format($job->salary_max) }}</span>
        </div>
    </div>

    <div class="my-4 border-t border-white/10"></div>

    <div class="text-base text-white/70">
        {{ $job->description }}
    </div>

    <div class="mt-4 flex items-center justify-between">
        <span class="text-xs text-white/40">{{ $job->created_at->diffForHumans() }}</span>
        <div class="flex gap-2">
            <a href=""
               class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 overflow-hidden transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                Edit
            </a>
            <form action="" method="POST" onsubmit="return confirm('Delete this job?');" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="cursor-pointer inline-flex items-center gap-2 rounded-lg border bg-white text-black font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:bg-gray-100 hover:text-black hover:border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
