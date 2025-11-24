<x-layout>
    <div class="relative">
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-10 top-1/2 -translate-y-2/3 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-10 top-2/3 -translate-y-1/2 w-80 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <section class="pt-4 max-w-5xl mx-auto relative z-10">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-extrabold">Interview Approvals</h2>
            </div>

            <div class="space-y-6">
                <h2 class="text-2xl font-bold mb-4">Pending Applicants</h2>
                @foreach($pendingInterviews as $interview)
                    <x-interview-card :$interview />
                @endforeach

                <div class="mt-10">
                    <h2 class="text-2xl font-bold mb-4">Approved Applicants</h2>
                    @foreach($approvedInterviews as $interview)
                        <x-interview-card :$interview />
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>
