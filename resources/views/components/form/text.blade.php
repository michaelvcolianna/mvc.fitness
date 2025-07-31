@props(['label'])

<div>
    <x-label :for="$attributes->get('id')" :value="$label" />
    <x-input {{ $attributes->merge(['class' => 'block mt-1 w-full']) }} />
</div>
