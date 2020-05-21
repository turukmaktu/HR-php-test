<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container">
            @include('layouts.menu')
            @include('layouts.breadcrumb')
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>