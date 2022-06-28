<div class="flex">

  {{-- Side menu --}}
  <div class="bg-slate-100 pt-16 text-slate-600 drop-shadow-xl">
    <ul class="flex flex-col py-5">
      @foreach (['category', 'product', 'about', 'contact'] as $model)
        <li wire:click="$set('modelName', '{{ $model }}')"
          class="cursor-pointer p-5 transition duration-300 hover:translate-x-2 hover:scale-125 hover:text-slate-700">
          {{ __(ucfirst($model)) }}
        </li>
      @endforeach
    </ul>
  </div>

  {{-- Contents --}}
  <div class="max-h-screen min-h-screen grow overflow-auto bg-slate-50 p-32 pb-48">
    @switch($modelName)
      @case('category')
        @livewire('category-controller', ['locale' => $locale])
      @break

      @case('product')
        @livewire('product-controller', ['locale' => $locale])
      @break

      @case('about')
        @livewire('about-controller', ['locale' => $locale])
      @break

      @case('contact')
        @livewire('contact-controller')
      @break
    @endswitch
  </div>
</div>
