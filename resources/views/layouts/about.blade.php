@extends('welcome')

@section('title', __('About'))

@section('caption', __('About FAAC'))

@section('content')
  {{-- About --}}
  @php
  $locale = LaravelLocalization::getCurrentLocale();
  @endphp
  @foreach ($collection as $i => $item)
    <section class="min-h-screen bg-cover bg-center px-5 py-32 text-slate-700 shadow-[0_0_10rem_5rem_#e2e8f0]"
      style="background-image:url('{{ str_contains($item->image, 'http') ? $item->image : asset($item->image) }}')">
      <div class="container mx-auto mb-32">
        <div
          class="@if ($i === 2) text-slate-100 @endif mb-16 whitespace-pre-line text-center text-4xl uppercase">
          {{ $item["title_$locale"] }}</div>
        @if ($i === 0)
          <div class="mx-auto mb-10 grid max-w-6xl grid-cols-5 gap-10">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/50.jpg">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/patents.jpg">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/2400.jpg">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/distributors.jpg">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/subsidiaries.jpg">
          </div>
        @endif
        <div class="mx-auto max-w-6xl bg-slate-50 bg-opacity-75 py-10 px-16 text-xl">
          <div class="whitespace-pre-line py-4">{{ $item["paragraph_$locale"] }}
          </div>
          @if ($i === 0)
            <div class="py-4">
              <a href="https://en.calameo.com/read/000681578ef06b7cf8086" target="_blank" title="PDF"
                class="text-slate-500 underline transition-all duration-300 hover:text-inherit">
                {{ __('Download our Corporate presentation') }}
              </a>
            </div>
          @endif
        </div>
        @if ($i === 1)
          <div class="flex items-center justify-center gap-10 p-16">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/dream1.jpg">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/dream2.jpg">
            <img src="https://www.faac.co.uk/Apps/FAAC/Content/images/dream3.jpg">
          </div>
        @endif
      </div>
    </section>
  @endforeach
@endsection
