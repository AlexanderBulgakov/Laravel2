@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-400 rounded hover:bg-gray-400 rounded py-2 px-4 mx-2'
            : 'hover:bg-gray-400 rounded py-2 px-4 mx-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
