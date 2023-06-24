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

    <div class="px-4">
        <h1 class="block text-3xl font-bold my-4">{{ $user->name }}</h1>
        <div class="mb-4">{{ $user->email }}</div>
    </div>

    <form id="user-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
