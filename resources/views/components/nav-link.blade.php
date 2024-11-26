@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'px-4 py-3 hover:bg-gray-100 bg-gray-100 text-primary font-semibold rounded-lg duration-300 w-full'
            : 'px-4 py-3 hover:bg-gray-100 font-semibold rounded-lg duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
