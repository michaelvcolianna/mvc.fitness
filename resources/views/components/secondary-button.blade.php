@php
    $classes = implode(' ', [
        'inline-flex',
        'items-center',
        'px-4',
        'py-2',
        'bg-white',
        'border',
        'border-gray-300',
        'rounded-md',
        'font-semibold',
        'text-xs',
        'text-gray-700',
        'uppercase',
        'tracking-widest',
        'hover:bg-gray-50',
        'focus:outline-none',
        'focus:ring-2',
        'focus:ring-sky-500',
        'focus:ring-offset-2',
        'disabled:opacity-25',
        'transition',
        'ease-in-out',
        'duration-150'
    ]);
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}
    >{{ $slot }}</button>
