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
            <div class="flex items-center mb-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm">
                    <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                    <div>
                        <span class="text-xl font-bold">Jese Leos</span>
                        <p class="text-base font-light text-gray-500">Graphic Designer, educator & CEO Flowbite</p>
                        <p class="text-base font-light text-gray-500"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="my-4">{{ $post->body }}</div>
    </article>

</x-guest-layout>