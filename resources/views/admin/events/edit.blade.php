<x-app-layout>
    <x-slot:title>
        {{ __('Edit event') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-cancel :href="route('events.show', $event->id)">{{ __('Cancel') }}</x-button-link-cancel>
    </div>

    <section class="p-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update Event') }}
            </h2>
        </header>

        <form action="{{ route('events.update', $event->id) }}" method="POST" class="mt-6 space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$event->title" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="event_date" :value="__('Event Date')" />
                <x-text-input id="event_date" name="event_date" type="text" class="mt-1 block w-full" placeholder="YYYY-MM-DD" :value="$event->event_date" required />
                <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Description (max:300)')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full" required>{{ $event->description }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Update') }}</x-primary-button>
            </div>
        </form>
    </section>

</x-app-layout>
