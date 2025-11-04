<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Listing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/studio-sans" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-black text-white font-sans pb-20 scrollbar-hide">
<div class="px-10">
    <nav class="flex justify-between items-center bg-red/10 py-4 border-b border-white/10">
        <div>
            <a href="/" class="flex items-center gap-3">
                <img src="{{ Vite::asset('resources/images/testlogo.svg') }}" class="w-12" alt="Logo">
                <h1 class="font-bold text-2xl">FlashFlow</h1>
            </a>
        </div>

        <div class="space-x-6 font-bold flex items-center">
            <a href="/">Home</a>
            @auth
            <a href="/jobs/{{ Auth::user()->id }}">Your Jobs</a>
            @endauth
            <a href="/interviews">Interviews</a>

            <a href="/jobs/create"
               class="inline-block rounded-lg border border-white/3 bg-gradient-to-b from-zinc-800 to-black text-gray-200 font-semibold text-base shadow-lg px-3 py-1.5 overflow-hidden transition hover:shadow-xl">
                <span class="flex items-center gap-2">
                    Post a Job
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </span>
            </a>

            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')
                <button class="cursor-pointer inline-block rounded-lg border bg-white text-black font-semibold text-base shadow-lg px-3 py-1.5 transition hover:shadow-xl">
                    <span class="flex items-center gap-2">
                      Log Out
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                </span>
                </button>
            </form>
            </div>

{{--        @guest()--}}
{{--            <div class="space-x-6 font-bold">--}}
{{--                <a href="/register">Sign Up</a>--}}
{{--                <a href="/login">Log In</a>--}}
{{--            </div>--}}
{{--        @endguest--}}
    </nav>

    <main class="mt-15 max-w-[1686px] mx-auto">
        {{$slot}}
    </main>
</div>

</body>
</html>
