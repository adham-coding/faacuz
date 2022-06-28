<label class="relative z-10">
  {{-- Dropdown button --}}
  <span class="block cursor-pointer transition-all duration-300 py-3 hover:scale-110 hover:opacity-75">
    {{ ucfirst(LaravelLocalization::getCurrentLocaleNative()) }}
  </span>

  {{-- Dropdown controller --}}
  <input class="menu" type="checkbox">

  {{-- Dropdown --}}
  <span
    class="dropdown pointer-events-none absolute w-36 top-11 right-1/2 grid translate-x-1/2 py-2 border-b-4 border-slate-600 bg-slate-800 text-center shadow-xl opacity-0 transition-all duration-200">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeName => $localeProperties)
      <a href="{{ LaravelLocalization::getLocalizedURL($localeName, null, [], true) }}"
        class="transition-all duration-300 hover:scale-110 hover:opacity-75 py-2">
        {{ $localeProperties['native'] }}
      </a>
    @endforeach
  </span>
</label>
