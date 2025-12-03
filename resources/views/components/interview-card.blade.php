@props(['interview', 'viewType'])

<div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300 my-5">
    <div class="flex justify-between items-start">
        <div>
            @if($interview->status === 'approved')
                <h3 class="text-2xl font-extrabold text-white group-hover:text-green-400 transition-colors duration-300">
                    {{ $interview->application->user->first_name }} {{ $interview->application->user->last_name }}
                </h3>
            @elseif($interview->status === 'pending')
                <h3 class="text-2xl font-extrabold text-white group-hover:text-blue-400 transition-colors duration-300">
                    {{ $interview->application->user->first_name }} {{ $interview->application->user->last_name }}
                </h3>
            @endif

            <div class="mt-2 text-lg text-white/80">
                Applying for: {{ $interview->application->job->title }}
            </div>
            <div class="text-sm text-white/50">{{ $interview->application->job->location }}</div>
        </div>

        <div class="flex flex-col items-end ml-4">
            @if($interview->status === 'approved')
                <span class="bg-green-800/20 text-green-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">{{ ucfirst($interview->status) }}</span>
            @elseif($interview->status === 'pending')
                <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">{{ ucfirst($interview->status) }}</span>
            @endif

            @if($interview->status === 'pending')
                <span class="text-lg font-bold text-white/90 mb-2">Submitted {{ $interview->created_at->diffForHumans() }}</span>
            @else
                <span class="text-lg font-bold text-white/90 mb-2">Approved {{ ($interview->approved_at ?? $interview->updated_at ?? $interview->created_at)->diffForHumans() }}</span>
            @endif
        </div>
    </div>

    <div class="my-4 border-t border-white/10"></div>

    @if($interview->application->message)
        <div class="text-base text-white/70 mb-4">
            {{ $interview->application->message }}
        </div>
    @endif

    <div class="flex gap-2 justify-end">
        @if($viewType === 'employer' && $interview->application->resume_path)
            <a href="{{ Storage::url($interview->application->resume_path) }}"
               target="_blank"
               class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                View Resume
            </a>
        @endif

        @if($interview->status === 'pending' && $viewType === 'employer')
            <x-form method="POST" action="/interviews/{{ $interview->id }}/approve">
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Approve
                </button>
            </x-form>

            <x-form method="POST" action="/interviews/{{ $interview->id }}/disapprove">
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg border bg-white text-black font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:bg-gray-100 hover:text-black hover:border-gray-300 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    Disapprove
                </button>
            </x-form>
        @endif
    </div>
</div>
