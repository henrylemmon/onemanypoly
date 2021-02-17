<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show A Video') }}
        </h2>
    </x-slot>
    <x-main-section>
            <h3 class="text-4xl semibold mt-4 mb-8 text-blue-500 underline">
                {{ $video->title }}
            </h3>
            <p>{{ $video->url }}</p>
            <hr class="mt-4">
            @if (! count($video->comments) == 0)
                @foreach ($video->comments as $comment)
                    <hr class="ml-8">
                    <div class="my-4 ml-8">
                        {{ $comment->body }}
                    </div>
                @endforeach
            @else
                <hr>
                <div class="my-4 ml-8">
                    No comments, what's your opinion here?
                </div>
            @endif
            @if (session()->has('comment-status'))
                <div class="ml-8 p-4 bg-red-500 text-white rounded">{{ session('comment-status') }}</div>
            @endif
            <div class="ml-8">
                <form method="POST" action="{{ route('comments.store', ['model' => 'video', 'id' => $video->id]) }}">
                    @csrf
                    <div class="mt-4">
                        @if ($video->comments->count() == 0)
                            <label for="body">Give us your opinion</label>
                        @endif
                        <textarea id="body" name="body" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"></textarea>
                        @error('body')
                        <div class="mb-4">
                            <span class="text-red-500 text-xs italic" role="alert">
                                {{ $message }}
                            </span>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Post Comment
                    </button>

                </form>
            </div>
    </x-main-section>
</x-app-layout>
