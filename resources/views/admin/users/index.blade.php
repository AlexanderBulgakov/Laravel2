<x-app-layout>
    <x-slot:title>
        {{ __('Users') }}
    </x-slot>

    <div class="px-4">
        <table class="border-collapse table-auto w-full text-sm mb-4">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="p-4 text-left">{{ __('ID') }}</th>
                    <th class="p-4 text-left">{{ __('Name') }}</th>
                    <th class="p-4 text-left">{{ __('Email') }}</th>
                    <th class="p-4 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-300">
                        <td class="p-4">{{ $user->id }}</td>
                        <td class="p-4">{{ $user->name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">
                            <x-button-link-cancel :href="route('users.show', $user->id)">{{ __('Info') }}</x-button-link-cancel>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
