@php
$locale = LaravelLocalization::getCurrentLocale();
$images = json_decode($item->images);
@endphp

@extends('welcome')

@section('title', ucwords($item->name))

@section('caption', $category["name_$locale"])

@section('content')
  {{-- Product --}}
  <section class="container mx-auto px-5">
    <div class="mx-auto grid pb-24 lg:grid-cols-2 lg:gap-4 lg:pb-40 xl:gap-16">
      <div>
        <div class="mb-6 bg-slate-50 p-4 shadow-lg">
          <div class="relative">
            <img id="product-image" src="{{ str_contains($images[0], 'http') ? $images[0] : asset($images[0]) }}"
              class="product block h-96 w-full cursor-zoom-in object-cover p-1 shadow-lg sm:h-[30rem] lg:h-96 xl:h-[30rem]">
            <div title="{{ __('Previous') }}"
              class="prev absolute top-1/2 left-0 flex h-12 w-12 -translate-y-1/2 cursor-pointer select-none items-center justify-center bg-slate-800 bg-opacity-10 text-lg text-slate-100 transition-all duration-300 hover:bg-opacity-50 xl:h-16 xl:w-16 xl:text-2xl">
              <span>
                &#10094;
              </span>
            </div>
            <div title="{{ __('Next') }}"
              class="next absolute top-1/2 right-0 flex h-12 w-12 -translate-y-1/2 cursor-pointer select-none items-center justify-center bg-slate-800 bg-opacity-10 text-lg text-slate-100 transition-all duration-300 hover:bg-opacity-50 xl:h-16 xl:w-16 xl:text-2xl">
              <span>
                &#10095;
              </span>
            </div>
          </div>
          <div class="flex flex-wrap py-4">
            @foreach ($images as $image)
              <img src="{{ str_contains($image, 'http') ? $image : asset($image) }}"
                class="thumb mr-2 h-16 w-16 cursor-pointer rounded-md object-cover p-1 shadow-lg transition-all duration-300 hover:scale-110 xl:h-20 xl:w-20">
            @endforeach
          </div>
        </div>
      </div>
      <div class="flex items-center p-2">
        <div>
          <div class="px-3 py-4">
            <div class="text-slate-700 sm:p-2">
              <div class="text-end pb-2 text-2xl md:pb-4 md:text-3xl">
                {{ $item->name }}
              </div>
              <div class="text-end text-xl text-slate-600 md:text-2xl">
                <span class="text-slate-400">Price:</span>
                <span>
                  {{ $item->price }} $
                </span>
              </div>
              <div class="flex items-center justify-end pt-4 text-slate-400">
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
              <div class="py-10">
                <div class="text-lg font-semibold">
                  {{ __('Key features') }}:
                </div>
                <ul class="list-disc pl-7 pt-2 pb-8">
                  @foreach (json_decode($item["features_$locale"]) as $feature)
                    <li class="py-1">{{ $feature }}</li>
                  @endforeach
                </ul>
                <div class="text-lg font-semibold">
                  {{ __('Product details') }}:
                </div>
                <div class="whitespace-pre-line py-2 sm:pl-3">
                  {{ $item["description_$locale"] }}</div>
              </div>
              {{-- <a href="{{ $item->requirements }}" target="_blank"
                class="mb-5 block font-semibold text-blue-600 transition-all duration-300 hover:text-blue-800 hover:underline">
                {{ __('Typical requirements for this product installation') }}
              </a>
              <a href="{{ $item->instructions }}" target="_blank"
                class="mb-5 block font-semibold text-blue-600 transition-all duration-300 hover:text-blue-800 hover:underline">
                {{ __('Articulated Beam Instructions for product') }}
              </a>
              <a href="{{ $item->parts }}" target="_blank"
                class="mb-5 block font-semibold text-blue-600 transition-all duration-300 hover:text-blue-800 hover:underline">
                {{ __('Search for product spare parts and part numbers') }}
              </a> --}}
            </div>
          </div>
          <a href="{{ route('contact') }}"
            class="block bg-slate-200 p-3 text-center font-semibold uppercase tracking-wider text-slate-600 shadow-lg transition-all duration-500 hover:scale-105 hover:bg-slate-100 hover:tracking-widest hover:text-slate-500 hover:shadow-xl md:text-lg">
            {{ __('Contact') }}
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- YouTube --}}
  <div class="mb-10 text-center text-3xl text-slate-500">
    {{ __('Watch on video') }}
  </div>
  <div class="mb-40 flex justify-center">
    <div class="bg-slate-100 p-2 shadow-xl">
      <iframe class="youtube" src="{{ $item->youtube }}" title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
    </div>
  </div>

  {{-- Modal --}}
  <section id="modal"
    class="pointer-events-none fixed top-0 z-50 flex h-screen w-full scale-150 items-center justify-center bg-slate-800 bg-opacity-75 opacity-0 blur-3xl transition-all duration-300">
    <div id="modal-closer"
      class="absolute right-4 top-4 z-50 flex h-12 w-12 cursor-pointer select-none items-center justify-center rounded-md bg-red-700 bg-opacity-50 text-4xl font-semibold leading-none text-red-200 transition-all duration-300 hover:bg-opacity-100 sm:right-8 sm:top-8">
      <span>
        &times;
      </span>
    </div>
    <div title="{{ __('Previous') }}"
      class="prev absolute top-0 left-0 flex h-full w-20 cursor-pointer select-none items-center bg-slate-800 bg-opacity-10 pl-8 text-2xl text-slate-100 transition-all duration-300 hover:bg-opacity-50 sm:w-32">
      <span>
        &#10094;
      </span>
    </div>
    <div title="{{ __('Next') }}"
      class="next absolute top-0 right-0 flex h-full w-20 cursor-pointer select-none items-center justify-end bg-slate-800 bg-opacity-10 pr-8 text-2xl text-slate-100 transition-all duration-300 hover:bg-opacity-50 sm:w-32">
      <span>
        &#10095;
      </span>
    </div>
    <div id="modal-image"
      style="background-image: url('{{ str_contains($images[0], 'http') ? $images[0] : asset($images[0]) }}')"
      class="h-[90vh] w-full bg-contain bg-center bg-no-repeat transition-all duration-500"></div>
    <div
      class="absolute bottom-5 left-5 right-5 z-50 flex overflow-auto rounded-lg bg-slate-500 p-4 opacity-10 transition-opacity duration-500 hover:opacity-75">
      @foreach ($images as $image)
        <img src="{{ str_contains($image, 'http') ? $image : asset($image) }}"
          class="thumb mr-2 h-20 w-20 cursor-pointer rounded-md bg-slate-100 object-cover p-1 shadow-lg transition-all duration-300 hover:scale-110">
      @endforeach
    </div>
  </section>

  <script src="{{ asset('js/product.js') }}"></script>
@endsection
