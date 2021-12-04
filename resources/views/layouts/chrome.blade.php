<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-188933430-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-188933430-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Captcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Lf4oBscAAAAAMgfkNIijNrsnX6moCsTwyHTdgpo"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Data Table -->
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('DataTables/datatables.min.js') }}" defer></script>
    <script src="{{ asset('DataTables/mytable.js') }}" defer></script>

    <!-- Select 2 -->
    <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('select2/dist/js/select2.min.js') }}" defer></script>
    <script src="{{ asset('select2/select2.js') }}" defer></script>

</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
 
</body>
</html>
