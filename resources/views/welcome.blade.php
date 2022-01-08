<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
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
            <p>Mic test</p>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Core -->
        <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
        <!-- Optional JS -->
        <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
        <!-- Argon JS -->
        <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
    </body>
</html>
