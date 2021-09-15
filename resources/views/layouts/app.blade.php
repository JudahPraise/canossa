<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href = "{{ asset('img/favicon.ico') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CHRMIS</title>

    <!-- Scripts -->
    <script  src="{{ asset('js/app.js') }}" defer></script>
    <script  src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script  src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    @yield('dropzone-js')

    <!-- Icons-->
    <link href="{{ asset('core-ui/css/free.min.css') }}" rel="stylesheet"> <!-- core-ui icons -->
    <link href="{{ asset('core-ui/css/flag-icon.min.css') }}" rel="stylesheet"> <!-- core-ui icons -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- core-ui style-->
    <link href="{{ asset('core-ui/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('core-ui/css/coreui-chartjs.css') }}" rel="stylesheet">

    @yield('dropzone-css')
    @yield('css')

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

    </style>
    
</head>
<body class="p-0">

    <main class="c-app bg-white">

        @yield('content')

    </main>
    
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('core-ui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('core-ui/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('material/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>

    @yield('js')

</body>
</html>
