<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>College Road Swimming Club | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @laravelPWA
</head>
<body data-barba="wrapper">
    <div id="app">
        <x-navigation />

        <main class="py-4" data-barba="container" data-barba-namespace="{{ Request::is('/') ? 'home' : Request::segment(1) }}">
            <x-messages :status="Session::get('success')" />
            @yield('content')
        </main>

        @guest
            <x-footer />
        @endguest
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
