<x-app-layout>
    <x-slot:title>
        {{ __('Show post') }}
    </x-slot>

    <div class="py-4 flex justify-between border-b">
        <a href="{{ route('posts.edit', $post->id) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Edit post') }}</a>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('post-{{ $post->id }}').submit();" class="ml-3">
            {{ __('Delete Post') }}
        </x-danger-button>
    </div>

    <h1 class="block text-3xl font-bold my-4">{{ $post->title }}</h1>
    <div class="mb-4">{{ $post->body }}</div>

    <form id="post-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="post" style="display:none;">
        @csrf
        @method('delete')
    </form>

</x-app-layout>
