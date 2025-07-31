@props(['value'])

@php
    $classes = implode(' ', [
        'block',
        'font-medium',
        'text-sm',
        'text-gray-700'
    ]);
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}
    >{{ $value ?? $slot }}</label>
