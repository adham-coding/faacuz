@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-slate-400 text-base font-medium text-slate-700 bg-slate-50 focus:outline-none focus:text-slate-800 focus:bg-slate-100 focus:border-slate-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:text-slate-800 focus:bg-slate-50 focus:border-slate-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
