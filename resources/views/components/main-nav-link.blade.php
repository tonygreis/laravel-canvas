@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-4 py-2 mt-2 text-sm font-bold uppercase text-fuchsia-500 rounded-lg dark:bg-fuchsia-500 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 focus:outline-none focus:shadow-outline'
            : 'px-4 py-2 mt-2 text-sm font-bold uppercase rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
