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

        <div class="mb-4 lg:mb-6 not-format">
            <div class="flex items-center mb-6">
                <div class="inline-flex items-center mr-3 text-sm">
                    @if ($post->user->hasMedia('avatars' ))
                        <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->user->getFirstMediaUrl('avatars', 'avatar') }}" alt="{{ $post->user->display_name }}">
                    @endif
                    <div>
                        <span class="text-xl font-bold">{{ $post->user->display_name }}</span>
                        <p class="text-base font-light text-gray-500">{{ $post->user->biography }}</p>
                        <p class="text-base font-light text-gray-500"><time pubdate datetime="{{ $date->format('Y-m-d') }}">{{ $date->format('F j, Y') }}</time></p>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="my-4">{{ $post->body }}</div>
    </article>

</x-guest-layout>