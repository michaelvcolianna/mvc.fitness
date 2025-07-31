@props(['for'])

@php
    $classes = implode(' ', [
        'text-sm',
        'text-fuchsia-600'
    ]);
@endphp

@error($for)
    <p {{ $attributes->merge(['class' => $classes]) }}>{{ $message }}</p>
@enderror
