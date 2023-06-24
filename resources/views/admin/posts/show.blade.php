<x-app-layout>
    <x-slot:title>
        {{ __('Show post') }}
    </x-slot>

    <div class="p-4 flex justify-between border-b">
        <x-button-link-edit :href="route('posts.edit', $post->id)">{{ __('Edit post') }}</x-button-link-edit>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('post-{{ $post->id }}').submit();" class="ml-3">
            {{ __('Delete Post') }}
        </x-danger-button>
    </div>

    <div class="px-4">
        <h1 class="block text-3xl font-bold my-4">{{ $post->title }}</h1>
        <div class="mb-4 text-sm">{{ $post->description }}</div>
        <div class="mb-4">{{ $post->body }}</div>
    </div>

    <form id="post-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
