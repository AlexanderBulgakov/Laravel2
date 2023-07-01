<x-guest-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot>

    <article class="mb-4">
        @if ($post->hasMedia('blog-images' ))
            <div class="mb-4">
                {{ $post->getFirstMedia('blog-images') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="my-4">{{ $post->body }}</div>
    </article>

</x-guest-layout>