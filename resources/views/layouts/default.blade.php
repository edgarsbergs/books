<html>
    <head>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div class="container" id="app">
        <div class="row">
            <div class="col col-12">
                @yield('content')
            </div>
        </div>
        <footer class="mt-4">
            (c) Eco baltia
        </footer>
    </div>
    </body>
</html>
