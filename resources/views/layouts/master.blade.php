<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}"/>
        @yield('styles')
    </head>
    <body>
        @include('includes.header')
        <div class="social-slider">
            FB <br>
            TW
        </div>
        <div class="main">
            @yield('content')
        </div>
        @include('includes.footer')
    </body>
</html>