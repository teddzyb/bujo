<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A bullet journal and needs tracking website created with Vue JS and Laravel.">
        <meta name="author" content="Edwin Bartlett, Jan Michael Garot, Niña Therese Ybas">
        <link rel="shortcut icon" href="{{ asset('img/brand/favicon.png') }}" type="image/x-icon">
        <title>Bujo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"></link>
        <!-- Icons -->
        <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet"></link>
        <link href="{{ asset('vendor/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet"></link>
        <!-- Argon CSS -->
        <link href="{{ asset('css/argon.css?v=1.2.0') }}" rel="stylesheet"></link>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Core -->
        <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
        <!-- Optional JS -->
        <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
        <!-- Argon JS -->
        <script src="{{ asset('js/argon.js?v=1.2.0') }}"></script>
    </body>
</html>
