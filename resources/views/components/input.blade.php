@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full rounded-md shadow-sm border-slate-300 focus:border-slate-400 focus:ring focus:ring-slate-300 focus:ring-opacity-50']) !!}>
