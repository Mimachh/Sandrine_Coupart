@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-test text-3xl text-red-600 font-bold pl-3 pr-4 py-2 border-l-4 border-indigo-400  bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition'
            : 'font-test text-2xl text-rose-500 block pl-3 pr-4 py-2 border-l-4 border-transparent hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
