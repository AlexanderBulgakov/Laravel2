<x-app-layout>
    <x-slot:title>
        {{ __('Create post') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-cancel :href="route('posts.index')">{{ __('Cancel') }}</x-button-link-cancel>
    </div>

    <section class="p-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Post') }}
            </h2>
        </header>

        <form x-data="{
                    loadingAnimation: 0,

                    enableLoadingAnimation() {
                        this.loadingAnimation = 1;
                    }
                }" @submit="enableLoadingAnimation" method="POST" action="{{ route('posts.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="image" :value="__('Image')" />
                <x-image-input id="image" name="image" />
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
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

            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-textarea id="body" name="body" class="mt-1 block w-full" required>{{ old('body') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('body')" />
            </div>

            <div class="flex items-center gap-4">
                <template x-if="loadingAnimation">
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </template>
                <template x-if="!loadingAnimation">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </template>
            </div>
        </form>
    </section>

</x-app-layout>
