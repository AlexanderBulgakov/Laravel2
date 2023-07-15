<x-guest-layout>
    <x-slot:title>
        {{ __('Blog page') }}
    </x-slot>

    <h1 class="block text-3xl font-bold mb-4 text-center">{{ __('Blog') }}</h1>

    @if($categories->isNotEmpty())
        <div class="py-4 border-t">
            <div class="flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <x-nav-header-link :href="route('blog')" :active="request()->routeIs('blog')">{{ __('All') }}</x-nav-header-link>
                @foreach($categories as $category)
                    <x-nav-header-link :href="route('category.show', $category->slug)" :active="request()->routeIs('category.show') && $category_id === $category->id">{{ $category->title }}</x-nav-header-link>
                @endforeach
            </div>
        </div>
    @endif

    @if($posts->isNotEmpty())
        <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-3">
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
        {{ $posts->links() }}
    @else
        <p>{{ __('No posts available') }}</p>
    @endif
</x-guest-layout>
