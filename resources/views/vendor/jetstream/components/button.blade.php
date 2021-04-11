<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:bg-gray-600 focus:border-gray-800 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
