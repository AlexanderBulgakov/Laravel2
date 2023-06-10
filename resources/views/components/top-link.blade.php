@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-200 underline hover:text-gray-200 hover:underline px-4'
            : 'hover:text-gray-200 hover:underline px-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>