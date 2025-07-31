@props(['asGrid' => true])

@php
    $classes = 'max-w-7xl mx-auto sm:px-6 lg:px-8';
@endphp

<div class="py-12">
    <div @class([$classes, 'grid gap-12' => $asGrid])>{{ $slot }}</div>
</div>
