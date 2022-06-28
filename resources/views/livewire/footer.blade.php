<footer class="border-t-8 border-slate-600 bg-slate-800 pt-5 text-slate-200">
  <div class="p-5">
    <div class="container mx-auto grid lg:grid-cols-2">
      <div>
        {{-- Logo --}}
        <a href="{{ route('welcome') }}">
          <img src="{{ asset('images/faac-simply-automatic-logo.png') }}"
            class="w-36 invert transition-all duration-300 hover:opacity-70" alt="FAAC">
        </a>
        <div class="max-w-lg py-5 text-sm">
          {{ __('Our milestone 50 years of business, for example, lead us to head towards even more ambitious aims and increasingly more significant results. For us, having reached them, and for all those who will be able to improve their lives thanks to FAAC technology, which, getting back to the figures, boasts the highest number of patents: 42 Gate automation originates from the intuition of our founder who first designed it and developed it. And together with us, remains in first place worldwide. And in our hearts.') }}
        </div>

      </div>

      <div class="grid lg:justify-end">

        {{-- Addres --}}
        <div class="py-8">
          <div class="pb-2 text-xl">
            {{ __('Connecting links') }}:
          </div>
          <div>
            <code class="text-slate-400">
              {{ __('Address') }}:
            </code>
            <a href="{{ $contact->address_link }}" target="_blank"
              class="italic text-slate-200 transition-all duration-300 hover:text-blue-400">
              {{ $contact->address }}
            </a>.
            <br>
            <code class="text-slate-400">
              Email:
            </code>
            <a href="mailto:{{ $contact->address }}"
              class="italic text-slate-200 transition-all duration-300 hover:text-blue-400">
              {{ $contact->email }}
            </a>.
            <br>
            <code class="text-slate-400">
              Tel.:
            </code>
            <a href="tel:{{ preg_replace('/ |\(|\)/', '', $contact->phone) }}"
              class="italic text-slate-200 transition-all duration-300 hover:text-blue-400">
              {{ $contact->phone }}
            </a>.
          </div>
        </div>

        {{-- Social --}}
        <div class="flex pb-3 text-slate-300">
          <a href="tg:{{ $contact->telegram }}" target="_blank" class="mr-6 h-8 w-8 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" fill="currentColor"
              class="h-full w-full transition-all duration-300 hover:scale-110 hover:text-slate-50">
              <path
                d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z" />
            </svg>
          </a>
          <a href="{{ $contact->youtube }}" target="_blank" class="mr-6 h-8 w-8 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"
              class="h-full w-full transition-all duration-300 hover:scale-110 hover:text-slate-50">
              <path
                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
            </svg>
          </a>
          <a href="{{ $contact->facebook }}" target="_blank" class="mr-6 h-8 w-8 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
              class="h-full w-full transition-all duration-300 hover:scale-110 hover:text-slate-50">
              <path
                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
            </svg>
          </a>
          <a href="{{ $contact->instagram }}" target="_blank" class="mr-6 h-8 w-8 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"
              class="h-full w-full transition-all duration-300 hover:scale-110 hover:text-slate-50">
              <path
                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- Author --}}
  <div class="flex flex-wrap items-center justify-center border-t-2 border-t-slate-700 p-3 text-sm text-slate-400">
    <span class="p-2">
      <span>
        &copy;
      </span>
      {{ date('Y') }}
      <span class="text-xl">
        &VerticalLine;
      </span>
      <span>
        Made by
      </span>
    </span>
    <a href="#"
      class="rounded bg-[crimson] p-0.5 text-slate-800 opacity-90 transition-all duration-300 hover:opacity-100 hover:drop-shadow-[0_0_0.4rem_crimson]">
      <code>
        {a:coding}
      </code>
    </a>
  </div>
</footer>
