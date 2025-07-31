@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <x-heading.h3>{{ $title }}</x-heading.h3>

        <x-layout.content>{{ $content }}</x-layout.content>
    </div>

    <x-layout.footer>{{ $footer }}</x-layout.footer>
</x-modal>
