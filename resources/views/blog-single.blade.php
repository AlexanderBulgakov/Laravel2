<x-guest-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot>

    <article class="mb-4">
        <h1 class="text-3xl font-bold pb-4">{{ $post->title }}</h1>
        <div class="my-4">{{ $post->body }}</div>
    </article>

</x-guest-layout>