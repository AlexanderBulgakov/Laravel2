<x-app-layout>
    <x-slot:title>
        {{ __('Show event') }}
    </x-slot>

    <div class="p-4 flex justify-between border-b">
        <x-button-link-edit :href="route('events.edit', $event->id)">{{ __('Edit event') }}</x-button-link-edit>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('event-{{ $event->id }}').submit();" class="ml-3">
            {{ __('Delete Event') }}
        </x-danger-button>
    </div>

    <div class="px-4">
        <h1 class="block text-3xl font-bold my-4">{{ $event->title }}</h1>
        <div class="mb-4 text-sm">{{ $event->description }}</div>
        <div class="mb-4">{{ $event->body }}</div>
    </div>

    <form id="event-{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
