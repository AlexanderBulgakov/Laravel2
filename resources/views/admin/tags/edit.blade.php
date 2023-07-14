<x-app-layout>
    <x-slot:title>
        {{ __('Edit tag') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-cancel :href="route('tags.show', $tag->slug)">{{ __('Cancel') }}</x-button-link-cancel>
    </div>

    <section class="p-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update Tag') }}
            </h2>
        </header>

        <form x-data="{
                    loadingAnimation: 0,

                    enableLoadingAnimation() {
                        this.loadingAnimation = 1;
                    }
                }" @submit="enableLoadingAnimation" action="{{ route('tags.update', $tag->slug) }}" method="POST" class="mt-6 space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$tag->title" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div class="flex items-center gap-4">
                <template x-if="loadingAnimation">
                    <x-load-animation></x-load-animation>
                </template>
                <template x-if="!loadingAnimation">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </template>
            </div>
        </form>
    </section>

</x-app-layout>
