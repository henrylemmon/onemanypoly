<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <x-main-section>
        <h3 class="text-4xl semibold mt-4 mb-8">Create A Post</h3>
        <form method="POST" action="/posts">
            @csrf
            <div class="mt-4">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                @error('title')
                    <span class="text-red-500 text-xs italic" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="my-4">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"></textarea>
                @error('body')
                    <span class="text-red-500 text-xs italic" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                Create
            </button>
        </form>
    </x-main-section>
</x-app-layout>
