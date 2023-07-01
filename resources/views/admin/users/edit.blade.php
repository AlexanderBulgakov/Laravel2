<x-app-layout>
    <x-slot:title>
        {{ __('Edit user') }}
    </x-slot>

    <div class="p-4 flex justify-end border-b">
        <x-button-link-cancel :href="route('users.show', $user->id)">{{ __('Cancel') }}</x-button-link-cancel>
    </div>

    <section class="p-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update User') }}
            </h2>
        </header>

        <form x-data="{
                    loadingAnimation: 0,

                    enableLoadingAnimation() {
                        this.loadingAnimation = 1;
                    }
                }" @submit="enableLoadingAnimation" action="{{ route('users.update', $user->id) }}" method="POST" class="mt-6 space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="role" :value="__('Role')" />
                <x-select id="role" name="role">
                    <option value="" selected>---</option>
                    @foreach($roles as $slug => $name)
                        <option {{ $slug == $user->role ? 'selected' : '' }} value="{{ $slug }}">{{ $name }}</option>
                    @endforeach
                </x-select>
                <x-input-error class="mt-2" :messages="$errors->get('role')" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$user->name" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$user->email" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('password')" />
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
