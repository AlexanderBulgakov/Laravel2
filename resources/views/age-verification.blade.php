<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Age Verification') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <div class="container mx-auto py-6">
                <section class="px-3">
                    <div class="shadow my-4">
                        <div class="p-6">

                            <section class="w-full flex flex-wrap items-center justify-center">
                                <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-6">
                                    @csrf
                                    <h1 class="block text-3xl font-bold mb-4">{{ __('Hello there,') }}<br/>{{ __('Care to show us some ID?') }}</h1>

                                    <div>
                                        <x-input-label for="check" :value="__('Please, enter your date of birth:')" />
                                        <x-text-input id="check" name="check" type="number" class="mt-1 block w-full" required autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('check')" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Enter') }}</x-primary-button>
                                    </div>
                                </form> 
                            </section>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>