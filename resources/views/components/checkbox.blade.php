@php
    $classes = implode(' ', [
        'rounded',
        'border-gray-300',
        'text-sky-600',
        'focus:ring-sky-500'
    ]);
@endphp

<input type="checkbox"
    {!! $attributes->merge(['class' => $classes]) !!}
/>
