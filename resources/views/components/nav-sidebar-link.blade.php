@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-100 flex items-center px-3 py-2 rounded-lg'
            : 'flex items-center px-3 py-2 rounded-lg hover:bg-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="mx-2 text-sm font-medium">{{ $slot }}</span>
</a>
