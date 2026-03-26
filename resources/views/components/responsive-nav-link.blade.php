@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-3 border-l-2 border-gray-900 text-start text-[11px] uppercase tracking-[0.2em] font-bold text-gray-900 bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition duration-300 ease-in-out'
            : 'block w-full ps-3 pe-4 py-3 border-l-2 border-transparent text-start text-[11px] uppercase tracking-[0.2em] font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 hover:border-gray-300 focus:outline-none transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
