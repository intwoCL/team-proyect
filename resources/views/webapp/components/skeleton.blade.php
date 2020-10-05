<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Programa TEAM')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="/vendor/dark/dark-mode.css">
  @stack('stylesheet')
</head>
<body class="layout-3">
<div id="app">
  @yield('app')
</div>
@stack('footerNav')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="/vendor/dark/dark-mode-switch.js"></script>
@include('partials._toast')
@stack('javascript')
</body>
</html>
