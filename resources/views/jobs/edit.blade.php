<x-layout>
    <div class="relative scrollbar-hide overflow-x-hidden">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-40 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-40 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="relative">
            <div class="relative z-10 max-w-6xl mx-auto bg-gradient-to-br from-white/30 via-black/10 to-black/90 rounded-2xl border border-zinc-700 shadow-xl p-6">
                <h2 class="text-2xl font-extrabold text-white mb-1">Edit Job</h2>
                <div class="mb-4 border-t border-white/10"></div>


                <x-form action="/jobs/{{ $job->id }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center gap-3 p-4 bg-white/5 rounded-xl border border-white/10">
                        <input type="checkbox"
                               name="featured"
                               id="featured"
                               value="1"
                               {{ $job->featured ? 'checked' : '' }}
                               class="w-5 h-5 rounded bg-white/10 border-white/20 text-blue-600 focus:ring-2 focus:ring-blue-500/30 cursor-pointer">
                        <label for="featured" class="text-white font-semibold cursor-pointer select-none">
                            Featured Job
                            <span class="block text-sm text-white/60 font-normal">Select To Feature your Jobs</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-white font-bold mb-2">Job Title</label>
                        <input type="text" name="title" value="{{ old('title', $job->title) }}" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>

                    <div>
                        <label class="block text-white font-bold mb-2">Company Name</label>
                        <input type="text"
                               value="{{ $employer->company_name }}"
                               class="w-full px-4 py-3 rounded-xl bg-white/5 text-gray-300 border border-white/10 cursor-not-allowed opacity-75"
                               readonly
                               disabled>
                    </div>

                    <div>
                        <label class="block text-white font-bold mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location', $job->location) }}" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <label class="block text-white font-bold mb-2">Job Type</label>
                            <select name="type" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                                <option value="">Select Type</option>
                                <option value="Full Time" {{ old('type', $job->type) === 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                <option value="Part Time" {{ old('type', $job->type) === 'Part Time' ? 'selected' : '' }}>Part Time</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="block text-white font-bold mb-2">Work Location</label>
                            <select name="work_location" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                                <option value="">Select</option>
                                <option value="Work From Home" {{ old('work_location', $job->work_location) === 'Work From Home' ? 'selected' : '' }}>Work From Home</option>
                                <option value="Onsite" {{ old('work_location', $job->work_location) === 'Onsite' ? 'selected' : '' }}>Onsite</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <label class="block text-white font-bold mb-2">Starting Salary</label>
                            <input type="number" name="salary_min" value="{{ old('salary_min', $job->salary_min) }}" step="0.01" min="0" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                        </div>

                        <div class="w-1/2">
                            <label class="block text-white font-bold mb-2">Highest Salary</label>
                            <input type="number" name="salary_max" value="{{ old('salary_max', $job->salary_max) }}" step="0.01" min="0" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-white font-bold mb-2 italic">Description</label>
                        <textarea name="quote" rows="4" class="w-full px-4 py-3 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>{{ old('quote', $job->description) }}</textarea>
                    </div>

                    <div class="flex gap-4">
                        <input type="submit" value="Update Job" class="flex-1 rounded-lg border bg-white text-black font-semibold text-base shadow-lg px-6 py-3 transition hover:shadow-xl cursor-pointer">
                        <a href="{{ url()->previous() }}" class="flex-1 text-center rounded-lg border border-white/20 bg-transparent text-white font-semibold text-base shadow-lg px-6 py-3 transition hover:bg-white/10">Cancel</a>
                    </div>
                </x-form>
            </div>
        </section>
    </div>
</x-layout>
