@props(['label'])

@php
    $classes = implode(' ', [
        'rounded',
        'border-gray-300',
        'text-sky-600',
        'focus:ring-sky-500'
    ]);
@endphp

<div>
    <label for="{{ $attributes->get('id') }}" class="flex items-center">
        <input
            type="checkbox"
            {{ $attributes->merge(['class' => $classes]) }}
        />

        <x-auth.label>Remember me</x-auth.label>
    </label>
</div>
