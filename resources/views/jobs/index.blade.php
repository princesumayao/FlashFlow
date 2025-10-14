<x-layout>
    <div class="space-y-10 lg:bg-[url('../images/left-design.svg'),_url('../images/right-design.svg')] bg-no-repeat bg-[position:4rem_0rem,_right_0rem] bg-size-[300px,_300px] bg-none">
        <x-hero-section />

        <section class="pt-10">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                <x-section-header title="Featured Jobs" />
                <x-job-filter />
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <x-featured
                    title="Software Developer"
                    company="Omsim Corp"
                    location="Baao, Cam Sur"
                    type="Full Time"
                    workLocation="Work From Home"
                    salary="$80k - $120k"
                    description="Work Location: Work From Home"
                    postedDate="2 days ago"
                />

                <x-featured
                    title="Software Engineer"
                    company="Mismo Corp"
                    location="Baao, Cam Sur"
                    type="Part Time"
                    workLocation="Onsite"
                    salary="$80k - $120k"
                    description="Experience working with RESTful APIs"
                    postedDate="2 days ago"
                />

                <x-featured
                    title="Game Developer"
                    company="Prime Corp"
                    location="Baao, Cam Sur"
                    type="Full Time"
                    workLocation="Onsite"
                    salary="$80k - $120k"
                    description="Experience working with RESTful APIs"
                    postedDate="2 days ago"
                />

                <x-featured
                    title="Cybersecurity"
                    company="Baao Corp"
                    location="Baao, Cam Sur"
                    type="Full Time"
                    workLocation="Onsite"
                    salary="$80k - $120k"
                    description="Experience working with RESTful APIs"
                    postedDate="2 days ago"
                />

                <x-featured
                    title="Web Developer"
                    company="Bryce Corp"
                    location="Baao, Cam Sur"
                    type="Full Time"
                    workLocation="Work From Home"
                    salary="$80k - $120k"
                    description="Experience working with RESTful APIs"
                    postedDate="2 days ago"
                />

                <x-featured
                    title="Network Engineer"
                    company="Network Corp"
                    location="Pili, Cam Sur"
                    type="Full Time"
                    workLocation="Work From Home"
                    salary="$80k - $120k"
                    description="Experience working with RESTful APIs"
                    postedDate="2 days ago"
                />
            </div>
        </section>

        <section class="relative pt-12 pb-6">
            <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="absolute left-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />
            <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="absolute right-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />

            <x-banner />
        </section>

        <section class="pt-16">
            <div class="mb-4">
                <x-section-header title="Recent Jobs" />
            </div>

            <div class="space-y-6">
                <x-recent
                    title="Junior Web Designer"
                    description="Design engaging web interfaces for modern brands."
                    company="Pixel Studio"
                    location="Naga City"
                    type="Full Time"
                    workLocation="Work From Home"
                    salary="$30k - $50k"
                />

                <x-recent
                    title="Backend Engineer"
                    description="Basic knowledge of UI/UX design principles"
                    company="DevCorp"
                    location="Legazpi City"
                    type="Full Time"
                    workLocation="Onsite"
                    salary="$60k - $90k"
                />

                <x-recent
                    title="Frontend Developer"
                    description="Strong understanding of responsive web design and cross-browser compatibility"
                    company="DevHub"
                    location="Iriga City"
                    type="Full Time"
                    workLocation="Onsite"
                    salary="$40k - $70k"
                />

                <x-recent
                    title="Frontend Developer"
                    description="Experience working with RESTful APIs"
                    company="DevHub"
                    location="Iriga City"
                    type="Full Time"
                    workLocation="Onsite"
                    salary="$40k - $70k"
                />

                <x-recent
                    title="Frontend Developer"
                    description="Design engaging web interfaces for modern brands."
                    company="DevHub"
                    location="Iriga City"
                    type="Full Time"
                    workLocation="Onsite"
                    salary="$40k - $70k"
                />
            </div>
        </section>
    </div>
</x-layout>
