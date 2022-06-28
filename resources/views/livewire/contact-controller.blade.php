<div>

  <div class="text-center text-2xl text-slate-500 py-5">
    Contacts
  </div>

  @if ($contact)
    {{-- Table --}}
    <table class="w-full overflow-hidden rounded-t-xl bg-slate-50 text-slate-700 shadow-lg">
      <thead class="border-b border-b-slate-300 bg-slate-100 text-sm">
        <tr>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                <line x1="8" y1="2" x2="8" y2="18"></line>
                <line x1="16" y1="6" x2="16" y2="22"></line>
              </svg>
              <span class="ml-1">Address</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
              </svg>
              <span class="ml-1">Address link</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <circle cx="12" cy="12" r="4"></circle>
                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
              </svg>
              <span class="ml-1">Email</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                </path>
              </svg>
              <span class="ml-1">Phone</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <span class="ml-1">Location</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
              </svg>
              <span class="ml-1">Telegram</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round" class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <path
                  d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                </path>
                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
              </svg>
              <span class="ml-1">Youtube</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round" class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
              </svg>
              <span class="ml-1">Facebook</span>
            </div>
          </th>
          <th class="px-2 py-4">
            <div class="flex items-center pl-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round" class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5">
                </rect>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
              </svg>
              <span class="ml-1">Instagram</span>
            </div>
          </th>
          <th class="w-[10%] py-4">
            <div class="flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round" class="drop-shadow-[0_0_1px_rgba(0,0,0,0.5)]">
                <path d="M12 20h9"></path>
                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
              </svg>
              <span class="ml-1.5">Edit</span>
            </div>
          </th>
        </tr>
      </thead>
      <tbody class="text-lg">
        <tr class="border-b transition-all duration-300 hover:bg-slate-100">
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->address, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->address_link, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->email, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->phone, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->location, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->telegram, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->youtube, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->facebook, 0, 4) }}...
          </td>
          <td class="px-4 py-3 font-semibold">
            {{ substr($contact->instagram, 0, 4) }}...
          </td>
          <td class="w-[10%] py-3 text-center">
            <button wire:click="openForm({{ $contact->id }})"
              class="align-middle text-indigo-600 drop-shadow-[0_0_2px_rgba(79,70,229,0.6)] transition-all hover:scale-105 active:translate-y-[0.15rem]"
              title="Editing contact">
              <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  @else
    {{-- Create button --}}
    <div class="flex items-center justify-end py-5">
      <x-btn wire:click="openForm" class="bg-emerald-500 text-emerald-50 hover:bg-emerald-600 active:bg-emerald-400">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span class="ml-1">Create contact</span>
      </x-btn>
    </div>
  @endif

  {{-- Modal --}}
  <div
    class="{{ $form ?: 'opacity-0 pointer-events-none scale-150' }} fixed top-0 left-0 right-0 bottom-0 z-50 flex items-center justify-center bg-slate-900 bg-opacity-20 transition-all duration-300">
    <form wire:submit.prevent="formSetter"
      class="max-h-[44rem] w-[50rem] overflow-y-auto rounded-lg bg-slate-100 p-10 text-slate-600 shadow-lg">

      {{-- Form header --}}
      <div class="text-center text-3xl">
        {{ __(($contact ? 'Edit' : 'Create') . ' contact') }}
      </div>

      {{-- Address --}}
      <div class="py-3">
        <x-label-error title="Contact address" error="address" />
        <x-input type="text" wire:model="address" />
      </div>
      {{-- Address link --}}
      <div class="py-3">
        <x-label-error title="Contact address" error="address_link" />
        <x-input type="url" wire:model="address_link" />
      </div>
      {{-- Email --}}
      <div class="py-3">
        <x-label-error title="Contact email" error="email" />
        <x-input type="email" wire:model="email" />
      </div>
      {{-- Phone --}}
      <div class="py-3">
        <x-label-error title="Contact phone" error="phone" />
        <x-input type="tel" wire:model="phone" />
      </div>
      {{-- Location --}}
      <div class="py-3">
        <x-label-error title="Contact location" error="location" />
        <x-input type="text" wire:model="location" />
        <div class="text-end pt-1 pr-1">
          <a href="https://yandex.ru/map-constructor/location-tool" target="_blank" class="text-slate-400 underline hover:text-slate-600 transition-all duration-300">Select location</a>
          <span class="relative inline-block h-4 w-4 rotate-45 rounded-t-full rounded-bl-full bg-red-500">
            <span
              class="absolute top-1/2 left-1/2 h-2 w-2 -translate-y-1/2 -translate-x-1/2 rounded-full bg-slate-100"></span>
          </span>
        </div>
      </div>
      {{-- Telegram --}}
      <div class="py-3">
        <x-label-error title="Contact telegram" error="telegram" />
        <x-input type="url" wire:model="telegram" />
      </div>
      {{-- Youtube --}}
      <div class="py-3">
        <x-label-error title="Contact youtube" error="youtube" />
        <x-input type="url" wire:model="youtube" />
      </div>
      {{-- Facebook --}}
      <div class="py-3">
        <x-label-error title="Contact facebook" error="facebook" />
        <x-input type="url" wire:model="facebook" />
      </div>
      {{-- Instagram --}}
      <div class="py-3">
        <x-label-error title="Contact instagram" error="instagram" />
        <x-input type="url" wire:model="instagram" />
      </div>
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
