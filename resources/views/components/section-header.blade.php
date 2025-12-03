@props(['title', 'href' => null])

<div class="inline-flex items-center gap-x-4">
    <div class="flex items-center gap-x-2">
        <span class="w-2 h-2 bg-white inline-block"></span>
        <h3 class="font-bold text-lg">{{ $title }}</h3>
    </div>

    @if($href)
        <a href="{{ $href }}" class="hover:text-white/80 text-sm font-semibold transition-colors duration-300 flex items-center gap-1">
            View More
        </a>
    @endif
</div>
