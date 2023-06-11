<x-app-layout>
    <x-slot:title>
        {{ __('Posts') }}
    </x-slot>

    <table class="border-collapse table-auto w-full text-sm mb-4">
        <thead>
            <tr class="border-b border-gray-300">
                <th class="p-4 text-left">{{ __('ID') }}</th>
                <th class="p-4 text-left">{{ __('Title') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
            @foreach($posts as $post)
                <tr class="border-b border-gray-300">
                    <td class="p-4">{{ $post->id }}</td>
                    <td class="p-4"><a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
