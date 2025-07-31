@props(['href', 'label'])

<div>
    <div class="flex items-center">
        {{ $icon }}

        <h2 class="ms-3 text-xl font-semibold text-gray-900">
            <a href="{{ $href }}">{{ $label }}</a>
        </h2>
    </div>

    <p class="mt-4 text-gray-500 text-sm leading-relaxed">{{ $slot }}</p>

    <p class="mt-4 text-sm">
        <a href="{{ $href }}"
            class="inline-flex items-center font-semibold text-sky-700">Go
            <x-icons.right-arrow class="ms-1 size-5 fill-sky-500" />
        </a>
    </p>
</div>
