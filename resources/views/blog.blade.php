<x-guest-layout>
    <x-slot:title>
        {{ __('Blog page') }}
    </x-slot>
 
    <h1 class="block text-3xl font-bold mb-4">{{ __('Blog') }}</h1>
    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <article class="my-4">
                <h2 class="text-2xl font-bold pb-4"><a href="{{ route('blog.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a></h2>
                <p class="mb-4 text-sm">{{ $post->description }}</p>
            </article>
        @endforeach
    @else
        <p>{{ __('No posts available') }}</p>
    @endif
</x-guest-layout>