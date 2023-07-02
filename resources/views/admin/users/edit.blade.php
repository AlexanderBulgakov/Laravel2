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
                }" @submit="enableLoadingAnimation" action="{{ route('users.update', $user->id) }}" method="POST" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="avatar" :value="__('Avatar')" />
                <x-image-input id="avatar" name="avatar" :avatar="1" :value="$user->getFirstMediaUrl('avatars', 'avatar')" />
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>

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
                <x-input-label for="first_name" :value="__('First name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="$user->first_name" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Last name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="$user->last_name" required  />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>

            <div>
                <x-input-label for="display_name" :value="__('Display name')" />
                <x-text-input id="display_name" name="display_name" type="text" class="mt-1 block w-full" :value="$user->display_name" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('display_name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$user->email" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div x-data="{
                    biography: $el.dataset.biography,
                    limit: $el.dataset.limit,
                    get remaining() {
                        return this.limit - this.biography.length
                    }
                }" data-limit="300" data-biography="{{ $user->biography }}"
            >
                <x-input-label for="biography" :value="__('Biography')" />
                <p class="block font-medium text-sm text-gray-500">
                    {{ __('You have') }} <span x-text="remaining" class="text-orange-500"></span> {{ __('characters remaining.') }}
                </p>
                <x-textarea id="biography" x-model="biography" name="biography" class="mt-1 block w-full"></x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('biography')" />
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
