<x-app-layout>
    <x-slot:title>
        {{ __('Users') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-edit :href="route('users.create')">{{ __('Create') }}</x-button-link-edit>
    </div>

    <div class="px-4">
        <table class="border-collapse table-auto w-full text-sm mb-4">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="py-4 text-left">{{ __('ID') }}</th>
                    <th class="p-4 text-left">{{ __('Display name') }}</th>
                    <th class="p-4 text-left">{{ __('Email') }}</th>
                    <th class="p-4 text-left">{{ __('Role') }}</th>
                    <th class="p-4 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-300">
                        <td class="py-4">{{ $user->id }}</td>
                        <td class="p-4">{{ $user->display_name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">{{ $user->getRoles()[$user->role] }}</td>
                        <td class="py-4 text-right">
                            <x-button-link-cancel :href="route('users.show', $user->id)">{{ __('Info') }}</x-button-link-cancel>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
