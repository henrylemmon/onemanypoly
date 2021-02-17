<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Videos') }}
        </h2>
    </x-slot>
    @forelse($videos as $video)
        <x-main-section>
            <h3 class="text-4xl semibold mt-4 mb-8 text-blue-500 underline">
                <a href="{{ $video->path() }}">{{ $video->title }}</a>
            </h3>
        </x-main-section>
    @empty
        No Videos Yet
    @endforelse
</x-app-layout>
