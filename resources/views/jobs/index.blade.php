<x-layout>
    <div class="space-y-10 px-4 md:px-0 lg:bg-[url('../images/left-design.svg'),_url('../images/right-design.svg')] bg-no-repeat bg-[position:4rem_0rem,_right_0rem] bg-size-[300px,_300px] bg-none">
        <x-hero-section />

        @if (session('success'))
            <div class="fixed bottom-6 right-6 z-50 w-full max-w-sm px-4 animate-fade-in">
                <div class="bg-green-900/80 backdrop-blur-sm border border-green-700/50 text-green-100 px-5 py-4 rounded-lg shadow-xl">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="font-semibold text-sm mb-1 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Success
                            </p>
                            <p class="text-xs">{{ session('success') }}</p>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.parentElement.remove()" class="text-green-300 hover:text-green-100 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <section class="pt-10">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4 gap-4">
                <x-section-header title="Featured Jobs" href="/featured" />
                <x-job-filter :$locations />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                    <a href="{{ route('job.show', $job) }}" class="block">
                        <x-featured :$job />
                    </a>
                @endforeach
            </div>
        </section>

        <section class="relative pt-12 pb-6">
            <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block absolute left-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />
            <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block absolute right-0 top-1/2 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none" />

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
