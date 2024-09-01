@props(['active'])

@php
$classes = ($active ?? false)
? 'border-b-2 duration-150 ease-in-out focus:outline-none font-medium inline-flex items-center leading-5 pt-1 px-1
text-sm text-white transition'
: 'border-b-2 duration-150 ease-in-out focus:outline-none font-medium inline-flex items-center leading-5 pt-1 px-1
text-sm text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>