<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex flex-wrap items-start justify-center">
        <aside class="w-full md:w-1/3">
            <div class="w-full overflow-hidden p-4">
                <div class="rounded-md border-2 border-gray-300 border-solid p-2">
                    @include('inc.admin.sidebar-menu')
                </div>
            </div>
        </aside>
        <section class="w-full md:w-2/3">
            <div class="w-full overflow-hidden p-4">
                <div class="rounded-md border-2 border-gray-300 border-solid p-2">

                    <div class="p-4 border-b">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="p-4 border-b">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="p-4">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>
        </section>
    </div>

</x-app-layout>
