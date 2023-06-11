<x-app-layout>
    <x-slot:title>
        {{ __('Edit post') }}
    </x-slot>

    <div class="py-4 flex justify-end border-b">
        <a href="{{ route('posts.show', $post->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Cancel') }}</a>
    </div>

    <div class="p-4">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Update Post') }}
                </h2>
            </header>

            <form action="{{ route('posts.update', $post->id) }}" method="post" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$post->title" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div>
                    <x-input-label for="body" :value="__('Body')" />
                    <x-textarea id="body" name="body" class="mt-1 block w-full" required>{{ $post->body }}</x-textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('body')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </div>
            </form>
        </section>
    </div>

</x-app-layout>
