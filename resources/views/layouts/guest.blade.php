<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap">

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Scripts --}}
        <script src="{{ mix('js/manifest.js') }}" defer></script>
        <script src="{{ mix('js/vendor.js') }}" defer></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased text-gray-900 guest {{ $classes }}">
        <div class="flex flex-col min-h-screen">
            {{ $slot }}

            <x-footer />
        </div>
    </body>
</html>
