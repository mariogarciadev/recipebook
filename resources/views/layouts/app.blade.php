<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'RecipeBook') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<!--
  background: #fff url('images/tile.jpg') repeat-y top fixed
-->
<body style="background: #ffffe0 url('/storage/cover_images/applepie_1538925148.jpg')">
  @include('inc.navbar')
  <div class="container p-5" style="background: #ffffe0">
    @include('inc.alerts')
    @yield('content')
  </div>
</body>
</html>
