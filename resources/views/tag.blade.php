<x-guest-layout>
    <x-slot:title>
        {{ __('Tag') }} : {{ $tag->title }}
    </x-slot>

    <h1 class="block text-3xl font-bold mb-4 text-center">{{ __('Tag') }} : {{ $tag->title }}</h1>

    @if($posts->isNotEmpty())
        <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="w-full p-2 hover:bg-gray-100 hover:rounded sm:block">
                    @if ($post->hasMedia('blog-images' ))
                        <img src="{{$post->getFirstMediaUrl('blog-images', 'blog-preview')}}" role="presentation" class="object-cover w-full rounded h-44" alt="{{ $post->title }}">
                    @endif
                    <div class="pt-2 space-y-2">
                        <h2 class="text-xl">{{ $post->title }}</h2>
                        <span class="text-xs dark:text-gray-400">{{ __('Author') }} : {{ $post->user->display_name }}</span>
                        <p class="mb-2">{{ $post->description }}</p>
                        <span class="text-xs dark:text-gray-400">{{ __('Category') }} : {{ $post->category->title }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p>{{ __('No posts available') }}</p>
    @endif
</x-guest-layout>
