<x-app-layout>
    <x-slot:title>
        {{ __('Tags') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-edit :href="route('tags.create')">{{ __('Create') }}</x-button-link-edit>
    </div>

    <div class="px-4">
        <table class="border-collapse table-auto w-full text-sm mb-4">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="py-4 text-left">{{ __('ID') }}</th>
                    <th class="p-4 text-left">{{ __('Title') }}</th>
                    <th class="p-4 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr class="border-b border-gray-300">
                        <td class="py-4">{{ $tag->id }}</td>
                        <td class="p-4">{{ $tag->title }}</td>
                        <td class="py-4 text-right">
                            <x-button-link-cancel :href="route('tags.show', $tag->slug)">{{ __('Info') }}</x-button-link-cancel>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
