<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()-> getLocate())}}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-whith, initial-scale=1">

        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>{{config('app.name', 'laravel')}}</title>

        <link rel="dns-perfetch" href="">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
