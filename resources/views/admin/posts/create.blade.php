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

            <div>
                <x-input-label for="user_id" :value="__('Author')" />
                <x-select id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option {{ $user->id == old('user_id', auth()->user()->id) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->display_name }}</option>
                    @endforeach
                </x-select>
                <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
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
