<div>

  {{-- Head --}}
  <div class="grid grid-cols-3 items-center p-4">

    {{-- Search --}}
    <div>
      <div class="relative mt-1">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
          <svg class="h-5 w-5 text-slate-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"></path>
          </svg>
        </div>
        <input wire:model="searchQuery" value="{{ $searchQuery }}" type="search"
          class="w-80 rounded-md border border-slate-300 bg-slate-100 p-2.5 pl-10 text-sm text-slate-900 shadow-md transition duration-300 focus:border-slate-300 focus:bg-white focus:ring focus:ring-slate-200 focus:ring-opacity-50"
          placeholder="Search for products">
      </div>
    </div>

    <div class="text-center text-2xl text-slate-500">
      {{ $actived ? 'Actived' : 'Removed' }} Products
    </div>

    {{-- Active buttons --}}
    <div class="flex items-center justify-end">
      @if ($actived)
        <x-btn wire:click="openForm" class="bg-emerald-500 text-emerald-50 hover:bg-emerald-600 active:bg-emerald-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
          <span class="ml-1">Create product</span>
        </x-btn>
      @endif
      <x-btn wire:click="$toggle('actived')"
        class="{{ $actived ? 'bg-rose-500 text-rose-50 hover:bg-rose-600 active:bg-rose-400' : 'bg-emerald-500 text-emerald-50 hover:bg-emerald-600 active:bg-emerald-400' }} ml-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          @if ($actived)
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          @else
            <polyline points="20 6 9 17 4 12"></polyline>
          @endif
        </svg>
        <span class="ml-2">{{ $actived ? 'Removed' : 'Actived' }} products</span>
      </x-btn>
    </div>
  </div>

  {{-- Table --}}
  <table class="w-full overflow-hidden rounded-t-xl bg-slate-50 text-slate-700 shadow-lg">
    <thead class="border-b border-b-slate-300 bg-slate-100 text-sm">
      <tr>
        <th class="w-[5%] py-4 text-center">
          <div class="flex items-center pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              <line x1="4" y1="9" x2="20" y2="9"></line>
              <line x1="4" y1="15" x2="20" y2="15"></line>
              <line x1="10" y1="3" x2="8" y2="21"></line>
              <line x1="16" y1="3" x2="14" y2="21"></line>
            </svg>
            <span class="ml-0.5">Order</span>
          </div>
        </th>
        <th class="px-2 py-4">
          <div class="flex items-center pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
              <line x1="7" y1="7" x2="7.01" y2="7"></line>
            </svg>
            <span class="ml-1">{{ 'Product name' }}</span>
          </div>
        </th>
        <th class="py-4 text-left">
          <div class="flex items-center pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
              <line x1="7" y1="7" x2="7.01" y2="7"></line>
            </svg>
            <span class="ml-1">Product category</span>
          </div>
        </th>
        <th class="px-2 py-4">
          <div class="flex items-center pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
              </rect>
              <circle cx="8.5" cy="8.5" r="1.5"></circle>
              <polyline points="21 15 16 10 5 21"></polyline>
            </svg>
            <span class="ml-1.5">Product image</span>
          </div>
        </th>
        <th class="px-2 py-4">
          <div class="flex items-center pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              <line x1="12" y1="1" x2="12" y2="23"></line>
              <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
            <span class="ml-0.5">Product price</span>
          </div>
        </th>
        <th class="w-[10%] py-4">
          <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
            <span class="ml-1">Product state</span>
          </div>
        </th>
        <th class="w-[10%] py-4">
          <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              @if ($actived)
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
              @else
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
              @endif
            </svg>
            <span class="ml-1">{{ $actived ? 'Remove' : 'Delete' }}</span>
          </div>
        </th>
        <th class="w-[10%] py-4">
          <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
              @if ($actived)
                <path d="M12 20h9"></path>
                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
              @else
                <polyline points="23 4 23 10 17 10"></polyline>
                <polyline points="1 20 1 14 7 14"></polyline>
                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
              @endif
            </svg>
            <span class="ml-1.5">{{ $actived ? 'Edit' : 'Rescue' }}</span>
          </div>
        </th>
      </tr>
    </thead>
    <tbody wire:sortable="changeOrder" class="text-lg">
      @foreach ($products as $rowNum => $product)
        <tr wire:sortable.item="{{ $product->id }}" wire:key="item-{{ $product->id }}"
          class="border-b">
          <td wire:sortable.handle class="w-[5%] cursor-grab py-3 text-center">
            {{ ++$rowNum + $products->perPage() * ($products->currentPage() - 1) }}.
          </td>
          <td class="px-4 py-3 font-semibold capitalize">
            {{ substr($product->name, 0, 20) . (strlen($product->name) > 33 ? '...' : '') }}
          </td>
          <td class="px-4 py-3 font-semibold capitalize">
            {{ $product->getCategory["name_$locale"] }}
          </td>
          <td class="px-4 py-3">
            @php
              $images = json_decode($product->images);
            @endphp
            <img class="h-20 w-32 rounded-lg border border-slate-300 object-cover p-1"
              src="{{ str_contains($images[0], 'http') ? $images[0] : asset($images[0]) }}">
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ $product->price }} $
          </td>
          <td class="w-[10%] py-3 text-center">
            <button wire:click="changeState({{ $product->id }})"
              class="{{ $product->state ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded px-2.5 py-0.5 font-semibold shadow-md transition-all hover:scale-105 active:translate-y-[0.15rem]"
              title="Change state">
              {{ $product->state ? 'Active' : 'Passive' }}
            </button>
          </td>
          <td class="w-[10%] py-3 text-center">
            <button wire:click="simpleModal({{ $product->id }}, '{{ $actived ? 'remove' : 'delete' }}')"
              class="align-middle text-red-600 drop-shadow-[0_0_2px_rgba(220,38,38,0.6)] transition-all hover:scale-105 active:translate-y-[0.15rem]"
              title="{{ $actived ? 'Removing trash' : 'Deleting item' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round">
                @if ($actived)
                  <polyline points="3 6 5 6 21 6"></polyline>
                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                  <line x1="10" y1="11" x2="10" y2="17"></line>
                  <line x1="14" y1="11" x2="14" y2="17"></line>
                @else
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="15" y1="9" x2="9" y2="15"></line>
                  <line x1="9" y1="9" x2="15" y2="15"></line>
                @endif
              </svg>
            </button>
          </td>
          <td class="w-[10%] py-3 text-center">
            <button wire:click="{{ $actived ? "openForm($product->id)" : "simpleModal($product->id, 'rescue')" }}"
              class="{{ $actived ? 'text-indigo-600 drop-shadow-[0_0_2px_rgba(79,70,229,0.6)]' : 'text-green-600 drop-shadow-[0_0_4px_rgba(22,163,74,0.6)]' }} align-middle transition-all hover:scale-105 active:translate-y-[0.15rem]"
              title="{{ $actived ? 'Editing item' : 'Rescuing item' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round">
                @if ($actived)
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                @else
                  <polyline points="23 4 23 10 17 10"></polyline>
                  <polyline points="1 20 1 14 7 14"></polyline>
                  <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                @endif
              </svg>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- Pagination --}}
  <div class="mx-5 mt-4">
    {{ $products->links() }}
  </div>

  {{-- Simple modal --}}
  <div
    class="{{ $simpleModal ?: 'opacity-0 pointer-events-none scale-150' }} fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-slate-900 bg-opacity-20 transition-all duration-300">
    <div class="w-96 rounded-lg bg-slate-100 p-5 shadow-lg">
      <div>
        <h2 class="mt-3 mb-8 text-center text-xl tracking-wider text-stone-500">
          {{ strtoupper(substr($simpleModalType, 0, -1)) }}ING</h2>
      </div>
      <div>
        <div class="mb-5 flex items-start">
          <span
            class="{{ $simpleModalType === 'rescue' ? 'text-green-600 drop-shadow-[0_0_4px_rgba(22,163,74,0.6)]' : 'text-red-600 drop-shadow-[0_0_4px_rgba(220,38,38,0.6)]' }} flex w-1/4 items-center justify-center align-middle">
            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              @if ($simpleModalType === 'remove')
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
              @elseif($simpleModalType === 'delete')
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
              @else
                <polyline points="23 4 23 10 17 10"></polyline>
                <polyline points="1 20 1 14 7 14"></polyline>
                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
              @endif
            </svg>
          </span>
          <span class="w-3/4 text-lg text-stone-700">
            Are you sure you want to {{ $simpleModalType }} <span
              class="{{ $simpleModalType === 'rescue' ? 'text-green-600 drop-shadow-[0_0_1px_rgba(22,163,74,0.6)]' : 'text-red-500 drop-shadow-[0_0_1px_rgba(220,38,38,0.6)]' }} mr-1 tracking-wide">{{ $productName }}</span>?
          </span>
        </div>
      </div>
      <div class="flex justify-end">
        <x-btn-light class="mr-4 shadow-md active:translate-y-[0.15rem]" wire:click="$set('simpleModal', false)"
          wire:loading.attr="disabled">
          {{ __('Cancel') }}
        </x-btn-light>
        <x-btn
          class="{{ $simpleModalType === 'rescue'
              ? 'text-green-50 bg-green-700 border hover:bg-green-600 active:bg-green-800 focus:border-green-700 focus:ring-green-200'
              : 'text-rose-50 bg-rose-700 border hover:bg-rose-600 active:bg-rose-800 focus:border-rose-700 focus:ring-rose-200' }} mr-4 shadow-md focus:ring-opacity-75"
          wire:click="{{ $simpleModalType }}Product()" wire:loading.attr="disabled">
          {{ $simpleModalType }} product
        </x-btn>
      </div>
    </div>
  </div>

  {{-- Modal --}}
  <div
    class="{{ $form ?: 'opacity-0 pointer-events-none scale-150' }} fixed top-0 left-0 right-0 bottom-0 z-50 flex items-center justify-center bg-slate-900 bg-opacity-20 transition-all duration-300">
    <form wire:submit.prevent="formSetter"
      class="max-h-[44rem] w-[50rem] overflow-y-auto rounded-lg bg-slate-100 p-10 text-slate-600 shadow-lg">

      {{-- Form header --}}
      <div class="text-center text-3xl">
        {{ __(($productId ? 'Edit' : 'Create') . ' product') }}
      </div>

      {{-- Name --}}
      <div class="py-3">
        <x-label-error title="Product name" error="name" />
        <x-input type="text" wire:model="name" />
      </div>
      {{-- Price --}}
      <div class="py-3">
        <x-label-error title="Product price" error="price" />
        <x-input type="number" wire:model="price" />
      </div>
      {{-- Features UZ --}}
      <div class="py-3">
        <x-label-error title="Product features (UZ)" error="features_uz" />
        <x-textarea wire:model="features_uz" />
      </div>
      {{-- Features RU --}}
      <div class="py-3">
        <x-label-error title="Product features (RU)" error="features_ru" />
        <x-textarea wire:model="features_ru" />
      </div>
      {{-- Features EN --}}
      <div class="py-3">
        <x-label-error title="Product features (EN)" error="features_en" />
        <x-textarea wire:model="features_en" />
      </div>
      {{-- Description UZ --}}
      <div class="py-3">
        <x-label-error title="Product description (UZ)" error="description_uz" />
        <x-textarea wire:model="description_uz" />
      </div>
      {{-- Description RU --}}
      <div class="py-3">
        <x-label-error title="Product description (RU)" error="description_ru" />
        <x-textarea wire:model="description_ru" />
      </div>
      {{-- Description EN --}}
      <div class="py-3">
        <x-label-error title="Product description (EN)" error="description_en" />
        <x-textarea wire:model="description_en" />
      </div>
      {{-- Category --}}
      <div class="py-3">
        <x-label-error title="Product category" error="category" />
        <select wire:model="category"
          class="w-full rounded-md border-slate-300 shadow-sm focus:border-slate-400 focus:ring focus:ring-slate-300 focus:ring-opacity-50">
          <option value="">Select Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">
              {{ ucfirst($category["name_$locale"]) }}
            </option>
          @endforeach
        </select>
      </div>
      {{-- Requirements PDF link --}}
      {{-- <div class="py-3">
        <x-label-error title="Product requirements PDF link" error="requirementsLink" />
        <x-input type="url" wire:model="requirementsLink" />
      </div> --}}
      {{-- Instructions PDF link --}}
      {{-- <div class="py-3">
        <x-label-error title="Product instructions PDF link" error="instructionsLink" />
        <x-input type="url" wire:model="instructionsLink" />
      </div> --}}
      {{-- Parts PDF link --}}
      {{-- <div class="py-3">
        <x-label-error title="Product parts PDF link" error="partsLink" />
        <x-input type="url" wire:model="partsLink" />
      </div> --}}
      {{-- Youtube link --}}
      <div class="py-3">
        <x-label-error title="Product youtube link" error="youtubeLink" />
        <x-input type="url" wire:model="youtubeLink" />
      </div>
      {{-- New images --}}
      <div class="py-3">
        <x-label-error title="Product images" error="images" />
        <div class="items-top flex justify-between px-2">
          <x-input-file wire:model="images" multiple />
          <img class="w-28 rounded-lg border-2 border-emerald-400 object-cover p-1"
            src="{{ $thumb ? url($thumb) : asset('images/gallery.png') }}">
        </div>
      </div>
      {{-- Old images --}}
      @if ($oldImages)
        <div wire:sortable="changeImageOrder()" class="flex flex-wrap" wire:model="$oldImages">
          @foreach ($oldImages as $id => $oldImage)
            <div wire:sortable.item="{{ $id }}" wire:key="item-{{ $id }}"
              class="relative flex items-center justify-center">
              <img wire:sortable.handle
                class="m-1 w-28 cursor-grab rounded-lg border p-1 transition-all duration-300 hover:opacity-100"
                title="Change image order"
                src="{{ str_contains($oldImage, 'http') ? $oldImage : asset($oldImage) }}">
              <div wire:click="deleteImage({{ $id }})"
                class="absolute top-1 right-1 flex h-7 w-7 cursor-pointer items-center justify-center rounded bg-rose-500 p-1 text-xl font-bold text-slate-50 opacity-25 transition-all duration-300 hover:opacity-100"
                title="Delete this image">
                <span>&times;</span>
              </div>
            </div>
          @endforeach
        </div>
      @endif
      {{-- Submit buttons --}}
      <div class="flex justify-end pt-10">
        <x-btn-light wire:click="$set('form', false)">
          {{ __('Cancel') }}
        </x-btn-light>
        <x-btn-submit class="ml-4">
          {{ __('Save') }}
        </x-btn-submit>
      </div>
    </form>
  </div>
</div>
