<x-app-layout>
    <x-slot:title>
        {{ __('Show user') }}
    </x-slot>

    <div class="p-4 flex justify-between border-b">
        <x-button-link-edit :href="route('users.edit', $user->id)">{{ __('Edit') }}</x-button-link-edit>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('user-{{ $user->id }}').submit();" class="ml-3">
            {{ __('Delete') }}
        </x-danger-button>
    </div>

    <div class="px-4 my-4">
        @if ($user->hasMedia('avatars' ))
            <div class="mb-4">
                <img src="{{ $user->getFirstMediaUrl('avatars', 'avatar') }}" class="block object-cover h-44 w-44 rounded-full">
            </div>
        @endif
        <div class="mb-4"><span class="font-bold">{{ __('First name') }} : </span>{{ $user->first_name }}</div>
        <div class="mb-4"><span class="font-bold">{{ __('Last name') }} : </span>{{ $user->last_name }}</div>
        <div class="mb-4"><span class="font-bold">{{ __('Display name') }} : </span>{{ $user->display_name }}</div>
        <div class="mb-4"><span class="font-bold">{{ __('Email') }} : </span>{{ $user->email }}</div>
        <div class="mb-4"><span class="font-bold">{{ __('Role') }} : </span>{{ $user->getRoles()[$user->role] }}</div>
        <div class="mb-4"><span class="font-bold">{{ __('Biography') }} : </span>{{ $user->biography }}</div>
    </div>

    <form id="user-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
