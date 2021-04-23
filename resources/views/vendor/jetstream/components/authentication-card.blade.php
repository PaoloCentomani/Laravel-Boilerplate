<div class="flex flex-col items-center flex-1 pt-6 sm:justify-center sm:pt-0">
    <div class="w-full mt-8 overflow-hidden bg-white shadow-xl cursor-default sm:max-w-sm sm:rounded-lg">
        <div class="flex justify-center mt-12 mb-4">
            {{ $logo }}
        </div>

        <div class="px-5 py-6">
            {{ $slot }}
        </div>
    </div>
</div>
