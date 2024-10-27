@props([
    'active' => '',
])

@php
    $classes = $active
        ? 'flex items-center justify-between w-full px-3 py-2 bg-blue-700 md:bg-transparent md:text-blue-700 text-white text-gray-900 rounded dark:border-gray-700 dark:text-white  dark:focus:text-white md:w-auto md:border-0 md:p-0'
        : 'flex items-center justify-between w-full px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}
    <svg class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
    </svg></button>
