<x-app-layout>
    <x-slot:title>
        {{ __('Posts') }}
    </x-slot>

    <div class="px-4">
        <table class="border-collapse table-auto w-full text-sm mb-4">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="p-4 text-left">{{ __('ID') }}</th>
                    <th class="p-4 text-left">{{ __('Title') }}</th>
                    <th class="p-4 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="border-b border-gray-300">
                        <td class="p-4">{{ $post->id }}</td>
                        <td class="p-4">{{ $post->title }}</td>
                        <td class="p-4">
                            <x-button-link-cancel :href="route('posts.show', $post->id)">{{ __('Info') }}</x-button-link-cancel>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
