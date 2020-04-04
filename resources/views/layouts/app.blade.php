<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@hasSection('title') @yield('title') · {{ config('app.name') }} @else {{ config('app.name') }} @endif</title>
    @include('shared.analytics')

    {{-- Google Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ mix('css/vendor.css') }}" data-turbolinks-track="reload">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" data-turbolinks-track="reload">
    @yield('styles')

    {{-- Web App --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
    <link rel="manifest" href="{{ url('manifest.json') }}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')

    {{-- Scripts --}}
    @include('shared.scripts')
    <script src="{{ mix('js/manifest.js') }}" defer data-turbolinks-track="reload"></script>
    <script src="{{ mix('js/vendor.js') }}" defer data-turbolinks-track="reload"></script>
    <script src="{{ mix('js/app.js') }}" defer data-turbolinks-track="reload"></script>
</head>
<body class="font-sans text-base bg-gray-100 {{ $classes }}">
    <div id="app" class="flex flex-col min-h-screen">
        @section('header')
        <header class="app-header">
            @include('shared.header')
        </header>
        @show

        <main class="app-content flex flex-col flex-auto">
            @include('shared.flash')
            @yield('content')
        </main>

        <footer class="app-footer">
            @include('shared.footer')
        </footer>
    </div>

    {{-- Scripts --}}
    @yield('vendors')
    @yield('scripts')
</body>
</html>
