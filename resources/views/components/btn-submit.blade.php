<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:border-emerald-100 focus:ring ring-emerald-200 disabled:opacity-25 transition ease-in-out duration-150 shadow-md']) }}>
  {{ $slot }}
</button>