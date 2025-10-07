<x-layout>
    <div class="relative scrollbar-hide overflow-x-hidden">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-40 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-40 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="relative">
            <div class="relative z-10 max-w-6xl mx-auto bg-gradient-to-br from-white/30 via-black/10 to-black/90 rounded-2xl border border-zinc-700 shadow-xl p-6">
                <h2 class="text-2xl font-extrabold text-white mb-1">Post a New Job</h2>
                <div class="mb-4 border-t border-white/10"></div>
                <form action="/jobs" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-white font-bold mb-2">Job Title</label>
                    <input type="text" name="title" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                </div>

                <div>
                    <label class="block text-white font-bold mb-2">Company Name</label>
                    <input type="text" name="company" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                </div>

                <div>
                    <label class="block text-white font-bold mb-2">Location</label>
                    <input type="text" name="location" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="block text-white font-bold mb-2">Job Type</label>
                        <select name="type" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                            <option value="">Select Type</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label class="block text-white font-bold mb-2">Work Location</label>
                        <select name="work_location" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                            <option value="">Select</option>
                            <option value="Work From Home">Work From Home</option>
                            <option value="Onsite">Onsite</option>
                        </select>
                    </div>
                </div>

                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <label class="block text-white font-bold mb-2">Starting Salary</label>
                            <input type="text" name="salary_min" placeholder="$ 40,000" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                        </div>

                        <div class="w-1/2">
                            <label class="block text-white font-bold mb-2">Highest Salary</label>
                            <input type="text" name="salary_max" placeholder="$ 70,000" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                        </div>
                    </div>

                <div>
                    <label class="block text-white font-bold mb-2 italic">Description</label>
                    <input type="text" name="quote" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                </div>

                <button type="submit" class="w-full rounded-lg border bg-white text-black font-semibold text-base shadow-lg px-6 py-3 transition hover:shadow-xl">
                    Post Job
                </button>
            </form>
        </div>
    </section>
</div>
</x-layout>
