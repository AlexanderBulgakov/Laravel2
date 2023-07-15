<x-app-layout>
    <x-slot:title>
        {{ __('Show post') }}
    </x-slot>

    <div class="p-4 flex justify-between border-b">
        <x-button-link-edit :href="route('posts.edit', $post->slug)">{{ __('Edit post') }}</x-button-link-edit>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('post-{{ $post->id }}').submit();" class="ml-3">
            {{ __('Delete Post') }}
        </x-danger-button>
    </div>

    <div class="px-4">
        @if ($post->hasMedia('blog-images' ))
            <img src="{{$post->getFirstMediaUrl('blog-images', 'blog-preview')}}" class="mt-2 block mx-auto rounded">
        @endif
        <h1 class="block text-3xl font-bold my-4">{{ $post->title }}</h1>
        <div class="mb-4 text-sm bg-gray-500 text-white p-2">{{ $post->slug }}</div>
        <div class="mb-4 text-sm"><strong>{{ __('Status') }} : </strong>{{ $post->getStatuses()[$post->status] }}</div>
        <div class="mb-4 text-sm"><strong>{{ __('Category') }} : </strong>{{ $post->category->title }}</div>
        <div class="mb-4 text-sm"><strong>{{ __('Tags') }} : </strong>{{ $post->tags->pluck('title')->implode(', ') }}</div>
        <div class="mb-4 text-sm"><strong>{{ __('Author') }} : </strong>{{ $post->user->display_name }}</div>
        <div class="mb-4 text-sm">{{ $post->description }}</div>
        <div class="mb-4">{{ $post->body }}</div>
    </div>

    <form id="post-{{ $post->id }}" action="{{ route('posts.destroy', $post->slug) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
