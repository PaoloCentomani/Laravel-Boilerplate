@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'font-semibold text-sm text-red-600']) }}>{{ $message }}</p>
@enderror
