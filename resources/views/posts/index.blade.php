<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @forelse($posts as $post)
        <x-main-section>
            <h3 class="text-4xl semibold mt-4 mb-8 text-blue-500 underline">
                <a href="{{ $post->path() }}">{{ $post->title }}</a>
            </h3>
        </x-main-section>
    @empty
        No Posts Yet
    @endforelse
</x-app-layout>
