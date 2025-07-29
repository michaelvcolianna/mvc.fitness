@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-fuchsia-600']) }}>{{ $message }}</p>
@enderror
