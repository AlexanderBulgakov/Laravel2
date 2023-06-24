<x-app-layout>
    <x-slot:title>
        {{ __('Events') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-edit :href="route('events.create')">{{ __('Create') }}</x-button-link-edit>
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
                @foreach($events as $event)
                    <tr class="border-b border-gray-300">
                        <td class="py-4">{{ $event->id }}</td>
                        <td class="p-4">{{ $event->title }}</td>
                        <td class="py-4 text-right">
                            <x-button-link-cancel :href="route('events.show', $event->id)">{{ __('Info') }}</x-button-link-cancel>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
