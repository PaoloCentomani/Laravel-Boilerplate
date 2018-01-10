<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('styles')

    {{-- Web App --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
    <link rel="apple-touch-startup-image" href="{{ url('apple-touch-startup-image.png') }}">
    <link rel="manifest" href="{{ url('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('safari-pin-icon.svg') }}" color="#000">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
</head>
<body>
    <div id="app" class="{{ $classes }}">
        <header class="app-header">
            @include('shared.header')
        </header>

        <main class="app-content">
            @include('shared.flash')
            @yield('content')
        </main>

        <footer class="app-footer">
            @include('shared.footer')
        </footer>
    </div>

    {{-- Scripts --}}
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    @yield('vendors')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
