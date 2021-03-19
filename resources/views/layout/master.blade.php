<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veilinghuis - Webit skill test</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    @include('layout.components.navbar')

    @yield('content')

    @include('layout.components.footer')
</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
@include('layout.components.toasts')

</body>
</html>
