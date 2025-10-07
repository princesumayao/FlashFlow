<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicant</title>
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
            <a href="/applicant/home" class="flex items-center gap-3">
                <img src="{{ Vite::asset('resources/images/testlogo.svg') }}" class="w-12" alt="Logo">
                <h1 class="font-bold text-2xl">FlashFlow</h1>
            </a>
        </div>
        <div class="space-x-6 font-bold flex items-center">
            <a href="/applicant/home">Home</a>
            <a href="/applicant/interviews">Interviews</a>
            <a href="/applicant/profile">Profile</a>
            <form method="get" action="/login">
                @csrf
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
    </nav>
    <main class="mt-15 max-w-[1686px] mx-auto">
        {{$slot}}
    </main>
</div>
</body>
</html>
