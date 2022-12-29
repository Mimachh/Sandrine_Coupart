@props(['active'])

@php
$classes = ($active ?? false)
            ? 'rounded-b inline-flex items-center px-1 pt-1 border-b-2 border-red-600 text-md font-medium leading-5 text-blue-900 focus:outline-none focus:border-indigo-700 transition'
            : 'rounded-b inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-medium leading-5 text-blue-500 hover:text-blue-700 hover:border-red-300 focus:outline-none focus:text-blue-700 focus:border-red-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
