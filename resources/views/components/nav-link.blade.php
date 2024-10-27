@props([
    'active' => false,
])

@php
    $classes = $active
        ? 'block px-3 py-2 text-white bg-blue-700 rounded dark:bg-blue-600 md:bg-transparent md:p-0 md:text-blue-700 md:dark:bg-transparent md:dark:text-blue-500'
        : 'block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
