<x-app-layout>
    <x-slot:title>
        {{ __('Create post') }}
    </x-slot>

    <div class="p-4">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Create Post') }}
                </h2>
            </header>

            <form method="post" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div>
                    <x-input-label for="body" :value="__('Body')" />
                    <x-textarea id="body" name="body" class="mt-1 block w-full" required>{{ old('body') }}</x-textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('body')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </div>
            </form>
        </section>
    </div>

</x-app-layout>
