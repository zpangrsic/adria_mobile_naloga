<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <a href="{{ url('/') }}" class="text-sm text-black underline">Home</a>
                <a href="{{ url('/contact-form') }}" class="text-sm text-black underline">Contact Us</a>
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-sm text-black underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-black underline">Register</a>
                        @endif
                    @endif
                @endguest
                @auth
                    <a href="{{ url('admin/posts') }}" class="text-sm text-black underline">Edit Posts</a>
                @endauth

            </div>


            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @livewireScripts
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
