<x-app-layout>
    <x-slot:title>
        {{ __('Profile') }}
    </x-slot>

    <div class="p-4 border-b">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="p-4 border-b">
        @include('profile.partials.update-password-form')
    </div>

    <div class="p-4">
        @include('profile.partials.delete-user-form')
    </div>

</x-app-layout>
