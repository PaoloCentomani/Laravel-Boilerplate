<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-wider shadow-sm hover:text-gray-500 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
