<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hexlet Blog - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="links">
            <a href="{{ route('welcome') }}">Main</a>
            <a href="{{ route('page.about') }}">About</a>
            <a href="{{ route('page.team') }}">Team</a>
            <a href="{{ route('articles.index') }}">Articles</a>
            <a href="{{ route('testBd') }}">Test bd</a>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>