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
        <div class="min-h-screen bg-white">
            @include('inc.top')
            
            @include('inc.header')
            
            @include('inc.nav-header')

            <div class="container mx-auto py-6">
                <div class="flex flex-wrap items-start justify-center">
                    <aside class="w-full md:w-1/3">
                        <div class="w-full overflow-hidden p-4">
                            <div class="rounded-md border-2 border-gray-300 border-solid p-2">
                                @include('admin.sidebar-menu')
                            </div>
                        </div>
                    </aside>
                    <section class="w-full md:w-2/3">
                        <div class="w-full overflow-hidden p-4">
                            <div class="rounded-md border-2 border-gray-300 border-solid p-2">
                                {{ $slot }}
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            @include('inc.footer')
        </div>
    </body>
</html>