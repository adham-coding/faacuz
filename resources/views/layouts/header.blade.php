<header id="header"
  class="sticky -top-20 z-40 flex justify-between border-b-4 border-slate-600 bg-slate-800 px-8 py-3 text-slate-100 shadow-xl transition-all duration-500">
  <div id="logo" class="transition-all duration-300">
    <a href="{{ route('welcome') }}" title="{{ __('Home') }}">
      <img src="{{ asset('images/faac-simply-automatic-logo.png') }}"
        class="w-28 invert transition-all duration-300 hover:scale-105 hover:opacity-75" alt="FAAC">
    </a>
  </div>
  <div class="hidden items-center justify-center gap-10 text-lg capitalize lg:flex">
    <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('welcome') }}">
      {{ __('Home') }}
    </a>
    <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('products') }}">
      {{ __('Products') }}
    </a>
    <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('about') }}">
      {{ __('About') }}
    </a>
    <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('contact') }}">
      {{ __('Contact') }}
    </a>
    @include('components.lang-menu')
    @guest
      <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('login') }}">
        {{ __('Log in') }}
      </a>
    @endguest
    @auth
      <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('login') }}">
        {{ __('Dashboard') }}
      </a>
    @endauth
  </div>
  <label class="relative flex items-center justify-center lg:hidden">
    {{-- Dropdown button --}}
    <span class="cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </span>

    {{-- Dropdwon controller --}}
    <input class="menu" type="checkbox">

    {{-- Dropdown --}}
    <span
      class="dropdown pointer-events-none absolute -right-8 top-12 grid w-52 items-center border-b-4 border-slate-600 bg-slate-800 text-center text-lg capitalize opacity-0 py-3 shadow-xl transition-all duration-200">
      <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('welcome') }}">
        {{ __('Home') }}
      </a>
      <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('products') }}">
        {{ __('Products') }}
      </a>
      <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('about') }}">
        {{ __('About') }}
      </a>
      <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('contact') }}">
        {{ __('Contact') }}
      </a>
      @include('components.lang-menu')
      @guest
        <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('login') }}">
          {{ __('Log in') }}
        </a>
      @endguest
      @auth
        <a class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-3" href="{{ route('login') }}">
          {{ __('Dashboard') }}
        </a>
      @endauth
    </span>
  </label>

</header>
