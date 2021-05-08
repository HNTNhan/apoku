<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
    {{--            @include('layouts.navigation')--}}

    <!-- Page Heading -->
        <section class="px-8 py-4 shadow">
            <header class="container mx-auto">
                <a href="{{ route('home') }}">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight flex">
                        <img src="/images/logo.ico" alt="Tweety" width="32">
                        {{ __('Tweety') }}
                    </h1>
                </a>
            </header>
        </section>

        <!-- Page Content -->
        <section class="px-8 pt-10 pb-4 shadow">
            <main class="container mx-auto">
                <div class="lg:flex lg:justify-between">
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                        {{ $slot }}
                    </div>
                    <div class="lg:w-1/6">
                        @include('_friends-list')
                    </div>
                </div>
            </main>
        </section>

        @if(session()->has('message'))
            <div id="message-box"
                 class="fixed bg-blue-300 shadow-lg p-4 break-words rounded-lg text-sm transform translate-y-full"
                 style="bottom: 0px; right: 20px; max-width: 300px;">
                <p>{{ session()->get('message', 'default') }}</p>
            </div>
        @endif
    </div>

    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>


