<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Simple Blog') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        guest
        <div class="min-h-screen bg-white">
            @include('inc.top')
            
            @include('inc.header')
            
            @include('inc.nav-header')

            <div class="container mx-auto py-6">
                <section class="px-3">
                    <div class="shadow my-4">
                        <div class="p-6">
                            {{ $slot }}
                        </div>
                    </div>
                </section>
            </div>

            @include('inc.footer')
        </div>
    </body>
</html>