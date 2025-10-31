@props(['active' => false])

@php
$classes = $active
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-teal-500 text-lg font-extrabold text-teal-600 dark:text-teal-400 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-semibold text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 hover:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
