<x-layout>
    <div class="relative flex items-center justify-center">
        {{--pamblur chat--}}
        <div class="fixed inset-0 bg-black/10 backdrop-blur-md z-0"></div>

        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="fixed left-20 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="fixed right-20 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="bg-gradient-to-br from-white/30 via-black/10 to-black/90 rounded-2xl border border-zinc-700 shadow-2xl p-10 max-w-xl w-full relative z-10">
            <img src="{{ Vite::asset('resources/images/testlogo.svg') }}" alt="Logo" class="mx-auto mb-2 w-24 h-24 object-contain" />
            <div class="text-center text-white font-extrabold text-3xl mb-2 drop-shadow-lg tracking-wide">FlashFlow</div>
            <h2 class="text-4xl font-extrabold text-white mb-8 text-center">Welcome Back!</h2>

                <form action="/" method="get" class="space-y-5">
                    @csrf
                    <input type="text" name="email" placeholder="Email" class="w-full px-5 py-4 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition">
                    <input type="password" name="password" placeholder="Password" class="w-full px-5 py-4 rounded-xl bg-white/10 text-white border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition">
                    <input value="Login" type="submit" class="cursor-pointer w-full rounded-lg border bg-white text-black font-semibold text-lg shadow-lg px-6 py-4 transition hover:shadow-xl"/>
                </form>

                <div class="my-8 flex items-center gap-4">
                    <div class="flex-1 h-px bg-white/10"></div>
                    <span class="text-white/60 font-semibold text-base">OR</span>
                    <div class="flex-1 h-px bg-white/10"></div>
                </div>

            <div class="flex flex-col md:flex-row gap-3 justify-center">
                <a href="/registerEmployer" class="flex-1 rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-6 py-3 overflow-hidden transition hover:shadow-xl text-center flex items-center justify-center gap-2">
                    Sign Up as Employer
                </a>

                <a href="/registerApplicant" class="flex-1 rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-6 py-3 overflow-hidden transition hover:shadow-xl text-center flex items-center justify-center gap-2">
                    Sign Up as Applicant
                </a>
            </div>

        </div>
    </div>
</x-layout>
