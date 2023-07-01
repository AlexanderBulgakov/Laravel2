<x-app-layout>
    <x-slot:title>
        {{ __('Create event') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-cancel :href="route('events.index')">{{ __('Cancel') }}</x-button-link-cancel>
    </div>

    <section class="p-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Event') }}
            </h2>
        </header>

        <form x-data="{
                    loadingAnimation: 0,

                    enableLoadingAnimation() {
                        this.loadingAnimation = 1;
                    }
                }" @submit="enableLoadingAnimation" method="POST" action="{{ route('events.store') }}" class="mt-6 space-y-6">
            @csrf

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div x-data="{
                initDataPicker(){
                    flatpickr('#event_date', {
                        dateFormat: 'Y-m-d',
                        minDate: 'today'
                    });
                }
            }">
                <x-input-label for="event_date" :value="__('Event Date')" />
                <x-text-input id="event_date" x-init="initDataPicker" name="event_date" type="text" class="mt-1 block w-full" placeholder="YYYY-MM-DD" :value="old('event_date')" required />
                <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
            </div>

            <div x-data="{
                    description: $el.dataset.description,
                    limit: $el.dataset.limit,
                    get remaining() {
                        return this.limit - this.description.length
                    }
                }" data-limit="300" data-description="{{ old('description') }}"
            >
                <x-input-label for="description" :value="__('Description')" />
                <p class="block font-medium text-sm text-gray-500">
                    {{ __('You have') }} <span x-text="remaining" class="text-orange-500"></span> {{ __('characters remaining.') }}
                </p>
                <x-textarea id="description" x-model="description" name="description" class="mt-1 block w-full" required></x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div class="flex items-center gap-4">
                <template x-if="loadingAnimation">
                    <x-load-animation></x-load-animation>
                </template>
                <template x-if="!loadingAnimation">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </template>
            </div>
        </form>
    </section>

</x-app-layout>
