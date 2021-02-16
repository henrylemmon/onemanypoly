<x-guest-layout>
    @forelse($posts as $post)
        <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
            <h3 class="text-4xl semibold mt-4 mb-8 text-blue-500 underline">
                <a href="{{ $post->path() }}">{{ $post->title }}</a>
            </h3>
        </div>
    @empty
        No Posts Yet
    @endforelse
</x-guest-layout>