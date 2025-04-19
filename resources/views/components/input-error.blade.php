@props(['for'])

@error($for)
    {{-- Added prefixes within merge --}}
    <p {{ $attributes->merge(['class' => 'tw-text-sm tw-text-red-600']) }}>{{ $message }}</p>
@enderror