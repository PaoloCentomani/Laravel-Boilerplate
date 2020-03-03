@if ($search)
<p class="flex items-center my-2 text-sm">
    <p>
        {{ __('Search results for:') }} <span class="font-bold">{{ $search }}</span>
    </p>

    <a class="ml-1 text-gray-500 hover:text-red-600 focus:text-red-700" href="{{ url()->current() }}">
        @svg('cancel', __('Reset'), 'w-4 h-4 fill-current')
    </a>
</p>
@endif
