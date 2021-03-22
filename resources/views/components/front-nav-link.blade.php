@props(['active'])

@php
$classes = ($active ?? false)
            ? 'py-2 px-2 text-fuchsia-500 uppercase font-sans font-bold  rounded bg-gray-900 hover:text-gray-100 hover:font-medium md:mx-2'
            : 'py-2 px-2 text-fuchsia-500 uppercase font-sans font-bold  rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium md:mx-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
