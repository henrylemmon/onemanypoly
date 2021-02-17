<x-guest-layout>
    <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
        <h3 class="text-4xl semibold mt-4 mb-8 text-blue-500 underline">
            {{ $post->title }}
        </h3>
        <p>{{ $post->body }}</p>
        <hr class="mt-4">
        @if (! count($post->comments) == 0)
            @foreach ($post->comments as $comment)
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
            <form method="POST" action="{{ route('comments.store', ['model' => 'post', 'id' => $post->id]) }}">
                @csrf
                <div class="mt-4">
                    @if ($post->comments->count() == 0)
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
    </div>
</x-guest-layout>
