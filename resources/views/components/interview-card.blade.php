@props([
    'name' => 'Unnamed',
    'role' => '',
    'location' => '',
    'status' => '',
    'time' => '',
    'message' => '',
    'approveAction' => null,
    'disapproveAction' => null,
])

<div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl group transition-all duration-300">
    <div class="flex justify-between items-start">
        <div>
            @if($status === 'Approved')
                <h3 class="text-2xl font-extrabold text-white group-hover:text-green-400 transition-colors duration-300">
                    {{ $name }}
                </h3>
            @elseif($status === 'Pending')
                <h3 class="text-2xl font-extrabold text-white group-hover:text-blue-400 transition-colors duration-300">
                    {{ $name }}
                </h3>
            @endif

            <div class="mt-2 text-lg text-white/80">
                {{ $role ? "Applying for: {$role}" : '' }}
            </div>
            <div class="text-sm text-white/50">{{ $location }}</div>
        </div>

        <div class="flex flex-col items-end ml-4">

            @if($status === 'Approved')
                <span class="bg-green-800/20 text-green-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">{{ $status }}</span>
            @elseif($status === 'Pending')
                <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">{{ $status }}</span>
            @endif()

            @if($time)
                <span class="text-lg font-bold text-white/90 mb-2">{{ $time }}</span>
            @endif
        </div>
    </div>

    <div class="my-4 border-t border-white/10"></div>

    @if($message)
        <div class="text-base text-white/70 mb-4">
            {{ $message }}
        </div>
    @endif

    <div class="flex gap-2 justify-end">
        @if($approveAction)
            <form method="POST" action="{{ $approveAction }}">
                @csrf
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:from-zinc-700 hover:to-zinc-900 hover:text-white hover:border-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Approve
                </button>
            </form>
        @endif

        @if($disapproveAction)
            <form method="POST" action="{{ $disapproveAction }}">
                @csrf
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg border bg-white text-black font-semibold text-md shadow-lg px-4 py-1.5 transition-all duration-200 hover:bg-gray-100 hover:text-black hover:border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    Disapprove
                </button>
            </form>
        @endif
    </div>
</div>

