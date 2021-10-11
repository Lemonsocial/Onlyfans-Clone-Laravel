@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5  focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out '.(Auth::user()->personal_settings['Dark Mode'] ? '{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -100' : '{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -900' )
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500 hover:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 hover:border-gray-300 focus:outline-none focus:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }} 
</a>
