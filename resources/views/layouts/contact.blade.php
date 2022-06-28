@extends('welcome')

@section('title', __('Contact'))

@section('caption', __('Contact us'))

@section('content')
  {{-- Contact --}}
  <section class="container mx-auto mb-32 grid gap-20 lg:grid-cols-2 lg:gap-10 px-5 text-slate-700">

    {{-- Form --}}
    <form action="" class="bg-slate-100 px-4 pt-8 pb-5 shadow-xl">
      <div>
        <label class="mb-5 block bg-slate-50 p-2 shadow-xl">
          <div class="pb-1">
            {{ __('Name') }}: <span class="font-bold text-red-500">*</span>
          </div>
          <input type="text" name="name" placeholder="Alexandra Johanson"
            class="block w-full border-none bg-slate-100 p-3 shadow-lg transition-all duration-300 focus:bg-slate-50 focus:shadow-xl focus:ring-0" required>
        </label>
      </div>
      <div>
        <label class="mb-5 block bg-slate-50 p-2 shadow-xl">
          <div class="pb-1">
            {{ __('Phone') }}:
            <span class="font-bold text-red-500">
              *
            </span>
          </div>
          <input type="tel" name="phone" placeholder="+998 9? ??? ?? ??"
            class="block w-full border-none bg-slate-100 p-3 shadow-lg transition-all duration-300 focus:bg-slate-50 focus:shadow-xl focus:ring-0" required>
        </label>
      </div>
      <div>
        <label class="mb-5 block bg-slate-50 p-2 shadow-xl">
          <div class="pb-1">
            {{ __('Comment') }}:
          </div>
          <textarea name="message" placeholder="Your awesome comment"
            class="block h-40 w-full border-none bg-slate-100 p-3 shadow-lg transition-all duration-300 focus:bg-slate-50 focus:shadow-xl focus:ring-0"></textarea>
        </label>
      </div>
      <div class="mb-5 block bg-slate-100 p-2 shadow-xl">
        <input type="submit" value="{{ __('Send') }}"
          class="block w-full cursor-pointer bg-slate-200 p-3 text-center text-lg font-semibold uppercase tracking-wider text-slate-600 shadow-lg transition-all duration-500 hover:scale-105 hover:bg-slate-100 hover:tracking-widest hover:text-slate-500 hover:shadow-xl">
      </div>
    </form>

    {{-- Yandex map --}}
    <div>
      <div class="bg-slate-100 px-4 pb-5 pt-8 shadow-xl">

        {{-- Map --}}
        <div class="bg-slate-50 p-2 shadow-lg">
          <div class="pb-1">
            {{ __('Location') }}:
            <span class="relative inline-block h-4 w-4 rotate-45 rounded-t-full rounded-bl-full bg-red-500">
              <span
                class="absolute top-1/2 left-1/2 h-2 w-2 -translate-y-1/2 -translate-x-1/2 rounded-full bg-slate-100"></span>
            </span>
          </div>
          <div id="map-wrapper" class="relative shadow-lg">
            <div id="map-shield" class="absolute inset-0 z-10"></div>
            <div id="map" class="map h-96 w-full"></div>
          </div>
        </div>

        {{-- Logo --}}
        <div class="flex justify-center pt-7">
          <img src="{{ asset('images/faac-simply-automatic-logo.png') }}" class="w-52 xl:w-72" alt="FAAC">
        </div>

        {{-- Token --}}
        <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU" type="text/javascript"></script>

        {{-- Configuration --}}
        <script type="text/javascript">
          const mapShield = document.getElementById('map-shield');

          mapShield.addEventListener('mousemove', () => {
            mapShield.style.pointerEvents = 'none';
          });

          document.getElementById('map-wrapper')
            .addEventListener('mouseleave', () => {
              mapShield.style.pointerEvents = '';
            });

          // Location selector address
          // https://yandex.ru/map-constructor/location-tool

          ymaps.ready(init);

          function init() {
            const location = {{ $location }};

            const map = new ymaps.Map("map", {
              center: location,
              zoom: 15
            });

            const placemark = new ymaps.Placemark(location, {
              balloonContent: `
                          <span class="text-slate-600 font-mono">
                            Address:
                          </span>
                          <a href="https://yandex.uz/maps/10335/tashkent/house/YkAYdAJpS0MDQFprfX91cXpnbA==/?ll=69.259293%2C41.340516&z=20.52" target="_blank" class="transition-all duration-300 text-indigo-400 hover:text-blue-600 italic">
                            Taxtapul dahasi, Sebzor ko'chasi 3A
                          </a>
                          <br>
                          <span class="text-slate-600 font-mono">
                            Email:
                          </span>
                          <a href="mailto:faacuz@gmail.com" class="transition-all duration-300 text-indigo-400 hover:text-blue-600 italic">
                            faacuz@gmail.com
                          </a>
                          <br>
                          <span class="text-slate-600 font-mono">
                            Tel.:
                          </span>
                          <a href="tel:+998999999999" class="transition-all duration-300 text-indigo-400 hover:text-blue-600 italic">
                            +998 (99) 999 99 99
                          </a>
                          `,
            });

            map.geoObjects.add(placemark);
          }
        </script>
      </div>
    </div>
  </section>

@endsection
