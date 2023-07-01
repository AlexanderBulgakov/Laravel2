<x-app-layout>
    <x-slot:title>
        {{ __('Dashboard') }}
    </x-slot>

    <h1 class="block text-3xl text-center font-bold mb-4">{{ __('Hello') }} {{ Auth::user()->display_name }}</h1>

</x-app-layout>
