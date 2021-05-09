<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tweety</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="content-center">
                <div>
                    <h1 class="text-8xl text-blue-400 mb-8">Tweety</h1>
                </div>
                <div class="flex items-center justify-center">
                    @if (Route::has('login'))
                        @auth
                            <div>
                                <a href="{{ route('home') }}"
                                   class="text-xl text-gray-900 hover:bg-gray-300 py-2 px-4 rounded-xl"
                                >
                                    Home
                                </a>
                            </div>

                        @else
                            <div>
                                <a href="{{ route('login') }}"
                                   class="text-xl text-gray-900 hover:bg-gray-300 py-2 px-4 rounded-xl"
                                >
                                    Log in
                                </a>
                            </div>

                            @if (Route::has('register'))
                                <div>
                                    <a href="{{ route('register') }}"
                                       class="ml-4 text-xl text-gray-900 hover:bg-gray-300 py-2 px-4 rounded-xl"
                                    >
                                        Register
                                    </a>
                                </div>

                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
