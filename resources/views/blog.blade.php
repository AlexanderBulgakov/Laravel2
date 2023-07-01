<x-guest-layout>
    <x-slot:title>
        {{ __('Blog page') }}
    </x-slot>

    <h1 class="block text-3xl font-bold mb-4 text-center">{{ __('Blog') }}</h1>
    @if($posts->isNotEmpty())
        <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="w-full p-2 hover:bg-gray-100 hover:rounded sm:block">
                    <img role="presentation" class="object-cover w-full rounded h-44" src="https://source.unsplash.com/random/480x360?5">
                    <div class="pt-2 space-y-2">
                        <h2 class="text-xl">{{ $post->title }}</h2>
                        <span class="text-xs dark:text-gray-400">TODO</span>
                        <p>{{ $post->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p>{{ __('No posts available') }}</p>
    @endif
</x-guest-layout>
