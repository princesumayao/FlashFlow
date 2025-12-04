<x-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-8 -mt-15">
        {{--Pamblur chat--}}
        <div class="fixed inset-0 bg-black/10 backdrop-blur-md z-0"></div>
        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-20 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-20 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="bg-gradient-to-br from-black/30 via-black/10 to-black/90 rounded-2xl border border-zinc-400 shadow-2xl p-6 md:p-8 lg:p-10 max-w-6xl w-full relative z-10">
            <img src="{{ Vite::asset('resources/images/testlogo.svg') }}" alt="Logo" class="mx-auto mb-2 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 object-contain" />
            <div class="text-center text-white font-extrabold text-2xl md:text-3xl mb-2 drop-shadow-lg tracking-wide">FlashFlow</div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 md:mb-8 text-center">Create Applicant Account</h2>

            <form action="/registerApplicant" method="POST" class="space-y-4 md:space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-white/70 text-sm md:text-base font-medium mb-1">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="w-full px-4 py-3 rounded-lg bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>

                    <div>
                        <label for="last_name" class="block text-white/70 text-sm md:text-base font-medium mb-1">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="w-full px-4 py-3 rounded-lg bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-white/70 text-sm md:text-base font-medium mb-1">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-white/70 text-sm md:text-base font-medium mb-1">Contact Number</label>
                        <input type="number" id="phone" name="phone" placeholder="Contact Number" class="w-full px-4 py-3 rounded-lg bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-white/70 text-sm md:text-base font-medium mb-1">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-3 rounded-lg bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-white/70 text-sm md:text-base font-medium mb-1">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="w-full px-4 py-3 rounded-lg bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition" required>
                    </div>
                </div>

                <input value="Create Account" type="submit" class="cursor-pointer w-full rounded-lg border bg-white text-black font-semibold text-base md:text-lg shadow-lg px-5 md:px-6 py-3 md:py-4 transition hover:shadow-xl"/>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-blue-400 hover:underline text-sm md:text-base">Already have an account?</a>
            </div>
        </div>
    </div>
</x-layout>
