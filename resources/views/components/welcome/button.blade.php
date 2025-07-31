@props(['label'])

@php
    $classes = implode(' ', [
        'inline-block',
        'px-5',
        'py-1.5',
        'border-[#19140035]',
        'hover:border-[#1915014a]',
        'border',
        'text-[#1b1b18]',
        'rounded-sm',
        'text-sm',
        'leading-normal'
    ]);
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $label }}</a>
