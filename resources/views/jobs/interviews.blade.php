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
                <x-interview-card
                    name="Prince Umpad"
                    role="Full Stack Developer"
                    location="Iriga City"
                    status="Pending"
                    time="Submitted 2 days ago"
                    message='"that was ez 😎"'
                    approveAction="/interviews/chuchu/approve"
                    disapproveAction="/interviews/chuchu/disapprove"
                />

                <div class="mt-10">
                    <h2 class="text-2xl font-bold mb-4">Approved Applicants</h2>
                    <x-interview-card
                        name="Maria D. Magiba"
                        role="Backend Engineer"
                        location="Naga City"
                        status="Approved"
                        time="Approved 1 day ago"
                        message='"Sup Chat!"'
                    />
                </div>

            </div>
        </section>
    </div>
</x-layout>
