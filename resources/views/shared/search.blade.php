@if ($search)
<p class="flex items-center my-2 text-sm">
    {{ __('Search results for:') }} <b class="mx-1">{{ $search }}</b>

    <a class="text-gray-500 hover:text-red-600 focus:text-red-700" href="{{ url()->current() }}">
        @svg('cancel', __('Reset'), 'w-4 h-4 fill-current')
    </a>
</p>
@endif
