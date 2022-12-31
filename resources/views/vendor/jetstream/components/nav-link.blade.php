@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-test text-3xl font-bold rounded-b inline-flex items-center px-1 pt-1 border-b-2 border-red-600 leading-5 text-red-600 focus:outline-none focus:border-indigo-700 transition'
            : 'font-test text-xl rounded-b inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 text-rose-500 hover:text-blue-700 hover:border-red-300 focus:outline-none focus:text-blue-700 focus:border-red-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
