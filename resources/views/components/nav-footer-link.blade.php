@props(['active'])

@php
$classes = ($active ?? false)
            ? 'underline uppercase px-3 hover:undeline'
            : 'uppercase px-3 hover:underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
