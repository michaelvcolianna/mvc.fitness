<form {{ $attributes->merge(['class' => 'grid gap-4']) }}>
    @csrf

    {{ $slot }}
</form>
