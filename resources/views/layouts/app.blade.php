<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="Viteport" content="width=device-width, initial-scale=1">

    <link href="{{Vite::asset('resources/img/favicon.png')}}" rel="icon">
    <link href="{{Vite::asset('resources/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
      <!-- ======= Header ======= -->
    <x-header></x-header>

    <x-aside.index></x-aside.index>

    <main id="main" class="main">

      <x-infotitle :info="$info"></x-infotitle>
  
      @yield('content')
  
    </main><!-- End #main -->  

  <!-- ======= Footer ======= -->
  <x-footer></x-footer>
</body>
</html>
