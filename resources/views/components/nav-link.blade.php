@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b border-gray-900 text-[11px] uppercase tracking-[0.2em] font-bold leading-5 text-gray-900 focus:outline-none focus:border-gray-900 transition duration-300 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b border-transparent text-[11px] uppercase tracking-[0.2em] font-medium leading-5 text-gray-500 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-gray-900 focus:border-gray-300 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
