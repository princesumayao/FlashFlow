<x-layout>
    <div class="space-y-10 lg:bg-[url('../images/left-design.svg'),_url('../images/right-design.svg')] bg-no-repeat bg-[position:4rem_0rem,_right_0rem] bg-size-[300px,_300px] bg-none">
    <section class="text-center pt-6">
            <h1 class="font-bold text-6xl">Where Talent Meets Opportunity.</h1>
            <p class="mt-3 text-lg text-white/40 max-w-3xl mx-auto text-center">
                Your career starts with one click. Explore opportunities that match your passion and skills, and take the next step toward your dream job. Let us connect you with the future you deserve.
            </p>

{{--            <x-forms.form action="/search" class="mt-6">--}}
{{--                <x-forms.input :label="false" name="q" placeholder="Web Developer..." />--}}
{{--            </x-forms.form>--}}

            <form action="/search" method="GET" class="mt-10 flex justify-center">
                @csrf
                <div class="relative w-full max-w-md">
                    <span class="absolute inset-y-0 left-3 flex items-center text-white/30">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>
                    <input type="text" name="q" placeholder="Software Developer" class="w-full px-5 py-3 pl-10 pr-10 rounded-xl bg-gradient-to-b from-white/10 via-zinc-black to-black text-white/80 placeholder-white/30 border border-white/5 focus:outline-none focus:ring-2 focus:ring-white/20 transition"/>
                    <span class="absolute inset-y-0 right-3 flex items-center text-white/30 font-bold text-lg pointer-events-none select-none">S</span>
                </div>
            </form>

        <div class="flex flex-col items-center mt-6">
            <div class="overflow-hidden max-w-md w-full [mask-image:linear-gradient(to_right,transparent_0%,black_50%,black_50%,transparent_100%)]">
                <div class="flex w-max animate-marquee gap-10">
                    <div class="flex gap-10">
                        <span class="text-lg">Software Developer</span>
                        <span class="text-lg">Graphic Artist</span>
                        <span class="text-lg">Layout Designer</span>
                        <span class="text-lg">Digital Analyst</span>
                        <span class="text-lg">Cloud Engineer</span>
                    </div>
                    <div class="flex gap-10">
                        <span class="text-lg">Software Developer</span>
                        <span class="text-lg">Graphic Artist</span>
                        <span class="text-lg">Layout Designer</span>
                        <span class="text-lg">Digital Analyst</span>
                        <span class="text-lg">Cloud Engineer</span>
                    </div>
                </div>
            </div>
        </div>
        </section>


        <section class="pt-10">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                <div class="inline-flex items-center gap-x-2">
                    <span class="w-2 h-2 bg-white inline-block"></span>
                    <h3 class="font-bold text-lg">Featured Jobs</h3>
                </div>

                <form action="/jobs" method="GET" class="flex gap-2">
                    @csrf
                    <div>
                        <select name="type" class="inline-block rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-3 py-1.5 overflow-hidden transition hover:shadow-xl">
                                <option class="bg-black/80" value="">Job Types</option>
                                <option class="bg-black/80" value="full-time">Full Time</option>
                                <option class="bg-black/80" value="part-time">Part Time</option>
                                <option class="bg-black/80" value="contract">Full Schedule</option>
                        </select>
                    </div>
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
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                                Software Developer
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Omsim Corp</div>
                            <div class="text-sm text-white/50">Baao, Cam Sur</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                            <span class="bg-green-800/20 text-green-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">Work From Home</span>
                            <span class="text-lg font-bold text-white/90 mb-2">$80k - $120k</span>
                        </div>
                    </div>
                    <div class="my-4 border-t border-white/10"></div>
                    <div class="text-base text-white/70 italic">
                        "Work Location: Work From Home"
                    </div>
                    <div class="mt-4 text-xs text-white/40">
                        Posted 2 days ago
                    </div>
                </div>

                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                                Software Engineer
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Mismo Corp</div>
                            <div class="text-sm text-white/50">Baao, Cam Sur</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Part Time</span>
                            <span class="bg-yellow-800/20 text-yellow-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">Onsite</span>
                            <span class="text-lg font-bold text-white/90 mb-2">$80k - $120k</span>
                        </div>
                    </div>
                    <div class="my-4 border-t border-white/10"></div>
                    <div class="text-base text-white/70 italic">
                        "Experience working with RESTful APIs"
                    </div>
                    <div class="mt-4 text-xs text-white/40">
                        Posted 2 days ago
                    </div>
                </div>

                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                                Game Developer
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Prime Corp</div>
                            <div class="text-sm text-white/50">Baao, Cam Sur</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                            <span class="bg-yellow-800/20 text-yellow-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">Onsite</span>
                            <span class="text-lg font-bold text-white/90 mb-2">$80k - $120k</span>
                        </div>
                    </div>
                    <div class="my-4 border-t border-white/10"></div>
                    <div class="text-base text-white/70 italic">
                        "Experience working with RESTful APIs"
                    </div>
                    <div class="mt-4 text-xs text-white/40">
                        Posted 2 days ago
                    </div>
                </div>

                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                                Cybersecurity
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Baao Corp</div>
                            <div class="text-sm text-white/50">Baao, Cam Sur</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                            <span class="bg-yellow-800/20 text-yellow-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">Onsite</span>
                            <span class="text-lg font-bold text-white/90 mb-2">$80k - $120k</span>
                        </div>
                    </div>
                    <div class="my-4 border-t border-white/10"></div>
                    <div class="text-base text-white/70 italic">
                        "Experience working with RESTful APIs"
                    </div>
                    <div class="mt-4 text-xs text-white/40">
                        Posted 2 days ago
                    </div>
                </div>

                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                                Web Developer
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Bryce Corp</div>
                            <div class="text-sm text-white/50">Baao, Cam Sur</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                            <span class="bg-green-800/20 text-green-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">Work From Home</span>
                            <span class="text-lg font-bold text-white/90 mb-2">$80k - $120k</span>
                        </div>
                    </div>
                    <div class="my-4 border-t border-white/10"></div>
                    <div class="text-base text-white/70 italic">
                        "Experience working with RESTful APIs"
                    </div>
                    <div class="mt-4 text-xs text-white/40">
                        Posted 2 days ago
                    </div>
                </div>

                <div class="flex flex-col p-8 bg-gradient-to-br from-zinc-900 via-zinc-800 to-black rounded-2xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-extrabold group-hover:text-blue-500 transition-colors duration-300">
                                Network Engineer
                            </h3>
                            <div class="mt-2 text-lg text-white/80">Network Corp</div>
                            <div class="text-sm text-white/50">Pili, Cam Sur</div>
                        </div>
                        <div class="flex flex-col items-end ml-4">
                            <span class="bg-blue-800/20 text-blue-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2">Full Time</span>
                            <span class="bg-green-800/20 text-green-400 text-xs font-semibold px-4 py-1.5 rounded-xl mb-2 ml-2">Work From Home</span>
                            <span class="text-lg font-bold text-white/90 mb-2">$80k - $120k</span>
                        </div>
                    </div>
                    <div class="my-4 border-t border-white/10"></div>
                    <div class="text-base text-white/70 italic">
                        "Experience working with RESTful APIs"
                    </div>
                    <div class="mt-4 text-xs text-white/40">
                        Posted 2 days ago
                    </div>
                </div>

            </div>

        </section>

        <section class="relative pt-12 pb-6">
            <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="absolute left-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />
            <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="absolute right-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />

            <div class="relative z-10 flex items-center justify-center">
                <div class="bg-gradient-to-b from-black via-zinc-700 to-black rounded-3xl px-10 py-12 shadow-2xl max-w-2xl w-full text-center border border-white/5 flex flex-col items-center z-10">
                    <div class="mb-5 flex justify-center">
                        <img src="{{ Vite::asset('resources/images/testlogo.svg') }}" alt="Logo" class="w-16" />
                    </div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white drop-shadow-lg mb-4">
                        Looking for your next big opportunity?
                    </h2>
                    <p class="text-lg md:text-xl text-white/80 font-medium mb-6 max-w-xl">
                        Connect with employers who value your skills and ambitions. Start your career journey or take the next step—finding the right job has never been easier.
                    </p>
                    <div class="flex gap-4 justify-center ">
                        <a href="/" class="inline-block rounded-lg border bg-white text-black font-semibold text-base shadow-lg px-6 py-3 transition hover:shadow-xl">
                    <span class="flex items-center gap-2">
                        Get Started
                    </span>
                        </a>
                        <a href="/" class="inline-block rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-6 py-3 overflow-hidden transition hover:shadow-xl">
                    <span class="flex items-center gap-2">
                        Browse Jobs
                    </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-16">
            <div class="inline-flex items-center gap-x-2 mb-4">
                <span class="w-2 h-2 bg-white inline-block"></span>
                <h3 class="font-bold text-lg">Recent Jobs</h3>
            </div>

            <div class="space-y-6">
                <div class="flex items-center justify-between p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div>
                        <h4 class="text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">Junior Web Designer</h4>
                        <div class="text-base text-white/70 mt-1 italic">"Design engaging web interfaces for modern brands."</div>
                        <div class="text-lg text-white/70 mt-1">Pixel Studio &middot; Naga City</div>
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="flex gap-2 mb-2">
                            <span class="bg-blue-800/10 text-blue-800 text-base font-semibold px-4 py-2 rounded mb-2">Full Time</span>
                            <span class="bg-green-800/10 text-green-800 text-base font-semibold px-4 py-2 rounded mb-2 ml-2">Work From Home</span>
                        </div>
                        <span class="text-lg text-white/80 font-semibold">$30k - $50k</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div>
                        <h4 class="text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">Backend Engineer</h4>
                        <div class="text-base text-white/70 mt-1 italic">"Basic knowledge of UI/UX design principles"</div>
                        <div class="text-lg text-white/70 mt-1">DevCorp &middot; Legazpi City</div>
                    </div>

                    <div class="flex flex-col items-end">
                        <div class="flex gap-2 mb-2">
                            <span class="bg-blue-800/10 text-blue-800 text-base font-semibold px-4 py-2 rounded mb-2">Full Time</span>
                            <span class="bg-yellow-800/10 text-yellow-800 text-base font-semibold px-4 py-2 rounded mb-2 ml-2">Onsite</span>
                        </div>
                        <span class="text-lg text-white/80 font-semibold">$60k - $90k</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div>
                        <h4 class="text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">Frontend Developer</h4>
                        <div class="text-base text-white/70 mt-1 italic">"Strong understanding of responsive web design and cross-browser compatibility"</div>
                        <div class="text-lg text-white/70 mt-1">DevHub &middot; Iriga City</div>
                    </div>

                    <div class="flex flex-col items-end">
                        <div class="flex gap-2 mb-2">
                            <span class="bg-blue-800/10 text-blue-800 text-base font-semibold px-4 py-2 rounded mb-2">Full Time</span>
                            <span class="bg-yellow-800/10 text-yellow-800 text-base font-semibold px-4 py-2 rounded mb-2 ml-2">Onsite</span>
                        </div>
                        <span class="text-lg text-white/80 font-semibold">$40k - $70k</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div>
                        <h4 class="text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">Frontend Developer</h4>
                        <div class="text-base text-white/70 mt-1 italic">"Experience working with RESTful APIs"</div>
                        <div class="text-lg text-white/70 mt-1">DevHub &middot; Iriga City</div>
                    </div>

                    <div class="flex flex-col items-end">
                        <div class="flex gap-2 mb-2">
                            <span class="bg-blue-800/10 text-blue-800 text-base font-semibold px-4 py-2 rounded mb-2">Full Time</span>
                            <span class="bg-yellow-800/10 text-yellow-800 text-base font-semibold px-4 py-2 rounded mb-2 ml-2">Onsite</span>
                        </div>
                        <span class="text-lg text-white/80 font-semibold">$40k - $70k</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-8 min-h-[140px] bg-white/5 rounded-xl border border-zinc-900 shadow-xl hover:shadow-2xl hover:border-blue-700 transition-all duration-300 group">
                    <div>
                        <h4 class="text-2xl font-bold text-white group-hover:text-blue-500 transition-colors duration-300">Frontend Developer</h4>
                        <div class="text-base text-white/70 mt-1 italic">"Design engaging web interfaces for modern brands."</div>
                        <div class="text-lg text-white/70 mt-1">DevHub &middot; Iriga City</div>
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="flex gap-2 mb-2">
                            <span class="bg-blue-800/10 text-blue-800 text-base font-semibold px-4 py-2 rounded mb-2">Full Time</span>
                            <span class="bg-yellow-800/10 text-yellow-800 text-base font-semibold px-4 py-2 rounded mb-2 ml-2">Onsite</span>
                        </div>
                        <span class="text-lg text-white/80 font-semibold">$40k - $70k</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
