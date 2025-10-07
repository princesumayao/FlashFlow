<x-layout2>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-30 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-30 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="max-w-xl mx-auto mt-20 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-700 shadow-xl p-10 flex flex-col items-center relative z-10">
            <div class="w-full mb-8 p-6 rounded-xl bg-zinc-800/80 border border-zinc-700 shadow flex flex-col gap-3">
                <h3 class="text-xl font-bold text-white mb-1 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                    Software Developer
                </h3>
                <div class="flex items-center gap-2 text-white/60 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>
                    Omsim Corp
                </div>
                <div class="flex items-center gap-2 text-white/60 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    Work From Home
                </div>
                <div class="flex items-center gap-3 mt-2">
                    <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-3 py-1 rounded-xl flex items-center gap-1">
                        Full Time
                    </span>
                    <span class="text-sm text-white/80 font-bold flex items-center gap-1">
                        $60k - $90k
                    </span>
                </div>
            </div>

            <h2 class="text-2xl font-bold mb-6 text-center">Submit Your Resume</h2>
            <form method="POST" action="/jobs/1/apply" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
                @csrf
                <label class="text-white/80 font-semibold">Upload PDF Resume:</label>
                <input type="file" name="resume" accept="application/pdf" class="cursor-pointer block w-full text-white bg-zinc-800 rounded-lg p-2 mb-4" required/>
                <input type="submit" value="Submit Application" class="cursor-pointer w-full rounded-lg border bg-white text-black font-semibold text-lg shadow-lg px-6 py-3 transition hover:shadow-xl"/>
            </form>

        </div>
    </div>
</x-layout2>
