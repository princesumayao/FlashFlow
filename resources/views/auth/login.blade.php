<x-layout>
    <div class="fixed inset-0 flex items-center justify-center px-4 overflow-hidden">
        {{--pamblur chat--}}
        <div class="fixed inset-0 bg-black/10 backdrop-blur-md z-0"></div>

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

        @if ($errors->any())
            <div class="fixed bottom-6 right-6 z-50 w-full max-w-sm px-4 animate-fade-in">
                <div class="bg-red-900/80 backdrop-blur-sm border border-red-700/50 text-red-100 px-5 py-4 rounded-lg shadow-xl">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="font-semibold text-sm mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                Login Errors
                            </p>
                            <ul class="text-xs space-y-1 pl-6">
                                @foreach ($errors->all() as $error)
                                    <li class="list-disc">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.parentElement.remove()" class="text-red-300 hover:text-red-100 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <img src="{{ Vite::asset('resources/images/left-design.svg') }}" alt="" class="hidden lg:block fixed left-20 top-1/2 -translate-y-2/3 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />
        <img src="{{ Vite::asset('resources/images/right-design.svg') }}" alt="" class="hidden lg:block fixed right-20 top-2/3 -translate-y-1/2 w-110 h-auto object-contain opacity-20 pointer-events-none select-none z-0" />

        <div class="bg-gradient-to-br from-white/30 via-black/10 to-black/90 rounded-2xl border border-zinc-700 shadow-2xl p-6 md:p-10 max-w-xl w-full relative z-10 max-h-[90vh] overflow-y-auto">
            <img src="{{ Vite::asset('resources/images/testlogo.svg') }}" alt="Logo" class="mx-auto mb-2 w-16 h-16 md:w-24 md:h-24 object-contain" />
            <div class="text-center text-white font-extrabold text-2xl md:text-3xl mb-2 drop-shadow-lg tracking-wide">FlashFlow</div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 md:mb-8 text-center">Welcome Back!</h2>

            <x-form action="/login" method="POST" class="space-y-4 md:space-y-5">
                @csrf
                <input type="text" name="email" placeholder="Email" class="w-full px-4 md:px-5 py-3 md:py-4 rounded-xl bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition">
                <input type="password" name="password" placeholder="Password" class="w-full px-4 md:px-5 py-3 md:py-4 rounded-xl bg-white/10 text-white text-sm md:text-base border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition">
                <input value="Login" type="submit" class="cursor-pointer w-full rounded-lg border bg-white text-black font-semibold text-base md:text-lg shadow-lg px-5 md:px-6 py-3 md:py-4 transition hover:shadow-xl"/>
            </x-form>

            <div class="my-6 md:my-8 flex items-center gap-4">
                <div class="flex-1 h-px bg-white/10"></div>
                <span class="text-white/60 font-semibold text-sm md:text-base">OR</span>
                <div class="flex-1 h-px bg-white/10"></div>
            </div>

            <div class="flex flex-col gap-3 justify-center">
                <a href="/registerEmployer" class="rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-sm md:text-base shadow-lg px-5 md:px-6 py-2.5 md:py-3 overflow-hidden transition hover:shadow-xl text-center flex items-center justify-center gap-2">
                    Sign Up as Employer
                </a>

                <a href="/registerApplicant" class="rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-sm md:text-base shadow-lg px-5 md:px-6 py-2.5 md:py-3 overflow-hidden transition hover:shadow-xl text-center flex items-center justify-center gap-2">
                    Sign Up as Applicant
                </a>
            </div>
        </div>
    </div>

    <style>
        body {
            overflow: hidden;
        }
    </style>
</x-layout>
