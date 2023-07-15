<x-app-layout>
    <x-slot:title>
        {{ __('Posts') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-edit :href="route('posts.create')">{{ __('Create') }}</x-button-link-edit>
    </div>

    <div class="px-4">
        <table class="border-collapse table-auto w-full text-sm mb-4">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="py-4 text-left">{{ __('ID') }}</th>
                    <th class="p-4 text-left">{{ __('Title') }}</th>
                    <th class="p-4 text-left">{{ __('Status') }}</th>
                    <th class="p-4 w-1 text-right">{{ __('Image') }}</th>
                    <th class="p-4 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="border-b border-gray-300">
                        <td class="py-4">{{ $post->id }}</td>
                        <td class="p-4">{{ $post->title }}</td>
                        <td class="p-4">{{ $post->getStatuses()[$post->status] }}</td>
                        <td class="p-4 w-1 text-right">
                            @if ($post->hasMedia('blog-images' ))
                                <img src="{{$post->getFirstMediaUrl('blog-images', 'blog-thumbnail')}}" role="presentation" class="rounded">
                            @endif
                        </td>
                        <td class="py-4 text-right">
                            <x-button-link-cancel :href="route('posts.show', $post->slug)">{{ __('Info') }}</x-button-link-cancel>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
