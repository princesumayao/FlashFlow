<x-layout>
    <h1 class="font-bold text-center text-4xl mb-8 -mt-5">Results</h1>

    <div class="mt-6 space-y-6">
        @foreach($jobs as $job)
            <x-recent :$job />
        @endforeach
    </div>
</x-layout>
