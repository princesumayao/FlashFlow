<x-layout>
    <div class="space-y-10 lg:bg-[url('../images/left-design.svg'),_url('../images/right-design.svg')] bg-no-repeat bg-[position:4rem_0rem,_right_0rem] bg-size-[300px,_300px] bg-none">
        <x-hero-section />

        <section class="pt-10">
            <div class="flex items-center justify-between mb-4">
                <x-section-header title="Featured Jobs" href="/featured" />
                <x-job-filter :$locations />
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                    <a href="{{ route('job.show', $job) }}" class="block">
                        <x-featured :$job />
                    </a>
                @endforeach
            </div>

        </section>

        <section class="relative pt-12 pb-6">
            <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="absolute left-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />
            <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="absolute right-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />

            <x-banner />
        </section>

        <section class="pt-16" id="recent-jobs">
            <div class="mb-4">
                <x-section-header title="Recent Jobs" />
            </div>

            <div class="space-y-6">
                @foreach($recentJobs as $job)
                    <x-recent :$job />
                @endforeach
            </div>

            <div class="mt-8">
                {{ $recentJobs->links() }}
            </div>
        </section>
    </div>
</x-layout>

@if(request()->has('page'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('recent-jobs').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    </script>
@endif
