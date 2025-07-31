@props(['disabled' => false])

@php
    $classes = implode(' ', [
        'border-gray-300',
        'focus:border-sky-500',
        'focus:ring-sky-500',
        'rounded-md'
    ]);
@endphp

<input @disabled($disabled) {!! $attributes->merge(['class' => $classes]) !!} />
