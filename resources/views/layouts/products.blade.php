@php
$locale = LaravelLocalization::getCurrentLocale();
@endphp

@extends('welcome')

@section('title', ucwords($category["name_$locale"]))

@section('caption', $category["name_$locale"])

@section('content')
  {{-- Products --}}
  <section class="container mx-auto px-5">
    <div
      class="mx-auto grid max-w-sm grid-cols-1 justify-center gap-16 pb-40 sm:max-w-7xl sm:grid-cols-[33rem] lg:grid-cols-2">
      @foreach ($collection as $item)
        <div class="bg-slate-100 p-2 shadow-xl">
          @php
            $image = json_decode($item->images)[0];
          @endphp
          <a href="{{ route('product', $item->slug) }}" class="mb-6 block p-2 shadow-lg">
            <img src="{{ str_contains($image, 'http') ? $image : asset($image) }}"
              class="block h-72 w-full object-cover shadow-xl sm:h-96">
          </a>
          <div class="block px-2 pb-2 shadow-lg sm:px-3 sm:py-4">
            <div class="p-2 text-slate-700">
              <div class="text-xl sm:pb-4 sm:text-2xl">
                {{ $item->name }}
              </div>
              <div class="text-end text-lg text-slate-600 sm:text-2xl">
                {{ $item->price }} $
              </div>
              <div class="flex items-center justify-end py-1 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 26" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-eye">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <div class="ml-1">
                  {{ $item->hit }}
                </div>
              </div>
            </div>
            <a href="{{ route('product', $item->slug) }}"
              class="block bg-slate-200 p-3 text-center font-semibold uppercase tracking-wider text-slate-600 shadow-lg transition-all duration-500 hover:scale-105 hover:bg-slate-100 hover:tracking-widest hover:text-slate-500 hover:shadow-xl md:text-lg">
              {{ __('More info') }}
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
