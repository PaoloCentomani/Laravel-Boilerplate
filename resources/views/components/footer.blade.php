<footer class="py-5 text-xs font-medium text-center text-gray-500 cursor-default cursor-default">
    &copy; {{ date('Y') }}

    <a class="inline-block" href="{{ config('app.url') }}" target="_blank">
        {{ config('app.name') }}
    </a>.

    {{ __('All rights reserved.') }}
</footer>
