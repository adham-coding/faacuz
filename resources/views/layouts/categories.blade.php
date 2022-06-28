@php
$locale = LaravelLocalization::getCurrentLocale();
@endphp

@extends('welcome')

@section('title', __('Home'))

@section('caption', __('Categories'))

@section('content')
  {{-- Categories --}}
  <section class="container mx-auto px-5">
    <div class="mx-auto grid max-w-6xl gap-24 pb-40">
      @foreach ($collection as $item)
        <div class="bg-slate-100 p-2 shadow-xl md:py-6 md:px-7">
          <a href="{{ route('category', $item->slug) }}"
            class="mb-6 block border border-slate-200 bg-slate-100 p-2 shadow-xl">
            <img src="{{ str_contains($item->image, 'http') ? $item->image : asset($item->image) }}"
              class="category block h-80 max-h-72 w-full object-cover shadow-xl transition-all duration-700 sm:max-h-96 md:max-h-full">
          </a>
          <a href="{{ route('category', $item->slug) }}"
            class="block bg-slate-100 p-2 shadow-xl transition-all duration-500 hover:shadow-md">
            <div
              class="block bg-slate-200 p-3 text-center font-semibold uppercase tracking-wider text-slate-600 shadow-lg transition-all duration-500 hover:scale-105 hover:bg-slate-100 hover:tracking-widest hover:text-slate-500 hover:shadow-xl md:p-5 md:text-lg">
              {{ $item["name_$locale"] }}
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </section>
@endsection
