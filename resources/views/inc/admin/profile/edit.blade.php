<x-app-layout>
    <x-slot:title>
        {{ __('Profile') }}
    </x-slot>

    <div class="p-4 border-b">
        @include('inc.admin.profile.partials.update-profile-information-form')
    </div>

    <div class="p-4 border-b">
        @include('inc.admin.profile.partials.update-password-form')
    </div>

    <div class="p-4">
        @include('inc.admin.profile.partials.delete-user-form')
    </div>

</x-app-layout>
