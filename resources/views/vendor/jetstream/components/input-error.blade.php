@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'font-semibold text-xs text-red-600']) }}>{{ $message }}</p>
@enderror
