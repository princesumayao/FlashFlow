<form action="/jobs" method="GET" class="flex gap-2">
{{--    @csrf--}}
    <select name="type" class="inline-block rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-3 py-1.5 overflow-hidden transition hover:shadow-xl">
        <option class="bg-black/80" value="">Job Types</option>
        <option class="bg-black/80" value="full-time">Full Time</option>
        <option class="bg-black/80" value="part-time">Part Time</option>
        <option class="bg-black/80" value="contract">Full Schedule</option>
    </select>

    <select name="location" class="inline-block rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-3 py-1.5 overflow-hidden transition hover:shadow-xl">
        <option class="bg-black/80" value="">All Locations</option>
        <option class="bg-black/80" value="Baao, Cam Sur">Baao, Cam Sur</option>
        <option class="bg-black/80" value="Naga City">Naga City</option>
        <option class="bg-black/80" value="Legazpi City">Legazpi City</option>
        <option class="bg-black/80" value="Iriga City">Iriga City</option>
    </select>

    <select name="work_location" class="inline-block rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-3 py-1.5 overflow-hidden transition hover:shadow-xl">
        <option class="bg-black/80" value="">Work Area</option>
        <option class="bg-black/80" value="Work From Home">Work From Home</option>
        <option class="bg-black/80" value="Onsite">Onsite</option>
    </select>

    <button type="submit" class="cursor-pointer inline-block rounded-lg border bg-white text-black font-semibold text-base shadow-lg px-3 py-1.5 transition hover:shadow-xl">
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>
            Filter
        </span>
    </button>
</form>
