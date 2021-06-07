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
        <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <livewire:styles />

        {{-- Scripts --}}
        <script src="{{ mix('js/manifest.js') }}" defer></script>
        <script src="{{ mix('js/vendor.js') }}" defer></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased logged-in {{ $classes }}">
        <x-jet-banner />

        <div class="min-h-screen">
            <livewire:navigation-menu />

            {{-- Page Heading --}}
            @if (isset($header))
                <header class="bg-white shadow cursor-default">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Page Content --}}
            <main>
                {{ $slot }}
            </main>

            {{-- Page Footer --}}
            <x-footer />
        </div>

        <livewire:scripts />
        <script defer>
            livewire.onError(function (statusCode) {
                if (statusCode === 419) {
                    if (confirm('{{ __('This page has expired due to inactivity.\nWould you like to refresh the page?') }}')) {
                        location.reload();
                    }

                    return false;
                }
            });
        </script>
        @stack('modals')
    </body>
</html>
