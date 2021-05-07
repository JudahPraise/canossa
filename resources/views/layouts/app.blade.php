<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script  src="{{ asset('js/app.js') }}" defer></script>
    <script  src="{{ asset('js/sb-admin-js/sb-admin-2.min.js') }}" defer></script>
    <script  src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script  src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    @yield('dropzone-js')

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/orbit-css/orbit.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/sb-admin-css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('dropzone-css')

    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
    
</head>
<body>

    <main>
        @yield('content')
    </main>
    <script  src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ asset('js/sidenav.js') }}"></script>
</body>
</html>
