<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Title --}}
  <title>@yield('title', 'Faac')</title>

  {{-- Fonts --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  {{-- Styles --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  {{-- Livewire styles --}}
  @livewireStyles
</head>

<body class="bg-gradient-to-r from-slate-200 via-white to-slate-200">

  {{-- Navigation --}}
  @include('layouts.header')

  {{-- Showcase --}}
  <section id="showcase" class="relative flex items-center justify-center shadow-xl bg-slate-900">
    <img src="{{ asset('images/faac-simply-automatic-logo.png') }}" class="absolute animate-[ping_2.25s_ease] w-1/3 drop-shadow-[0_0_1rem_gray] invert">
    <video autoplay muted loop src="{{ asset('video/video.mp4') }}" class="z-10"></video>
  </section>

  {{-- Caption --}}
  <div id="caption" class="pt-24 pb-16 text-center text-3xl uppercase text-slate-500 md:pt-36 md:text-4xl">
    @yield('caption')
  </div>

  {{-- Content --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @livewire('footer')

  {{-- Call me --}}
  <div
    class="fixed right-6 bottom-20 z-40 h-11 w-11 animate-pulse cursor-pointer rounded-full bg-green-600 text-slate-50 shadow-lg transition-all duration-500">
    <a href="tel:+998977716967" class="relative flex h-full w-full items-center justify-center" title="{{ __('Call me') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path
          d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
        </path>
      </svg>
      <span class="absolute -z-10 inset-0 animate-[ping_2s_ease-in-out_1.4s_infinite] rounded-full bg-green-600 opacity-60"></span>
    </a>
  </div>

  {{-- To top --}}
  <div id="toTop"
    class="invisible fixed right-6 -bottom-11 z-40 flex h-11 w-11 cursor-pointer items-center justify-center bg-slate-100 text-slate-800 opacity-75 shadow-lg transition-all duration-500">
    <span class="rotate-90 leading-none">
      &#10094;
    </span>
  </div>

  {{-- Livewire scripts --}}
  @livewireScripts

  {{-- Scripts --}}
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
