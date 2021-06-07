@props(['disabled' => false, 'message' => __('Please Choose…')])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm transition ease-in-out duration-200']) }}>
    <option value="" disabled selected>{{ $message }}</option>
    {{ $slot }}
</select>
