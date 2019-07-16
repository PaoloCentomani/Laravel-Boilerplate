<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@hasSection('title') @yield('title') · {{ config('app.name') }} @else {{ config('app.name') }} @endif</title>
    @include('shared.analytics')

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('styles')

    {{-- Web App --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
    <link rel="manifest" href="{{ url('manifest.json') }}">
    <link rel="mask-icon" href="{{ url('safari-pin-icon.svg') }}" color="#000">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
</head>
<body class="font-sans bg-gray-100 {{ $classes }}">
    <div id="app" class="min-h-screen flex flex-col">
        <header class="app-header">
            @include('shared.header')
        </header>

        <main class="app-content flex-1">
            @include('shared.flash')
            @yield('content')
        </main>

        <footer class="app-footer">
            @include('shared.footer')
        </footer>
    </div>

    {{-- Scripts --}}
    @include('shared.scripts')
    <script src="{{ mix('js/manifest.js') }}" defer></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    @yield('vendors')
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
