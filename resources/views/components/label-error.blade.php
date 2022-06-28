@props(['title', 'error'])

<label class="mb-1 flex items-center justify-between">
  <span>
    {{ ucfirst(__($title)) }}:
  </span>
  @error($error)
    <span class="text-rose-600">{{ ucfirst($message) }}</span>
  @enderror
</label>
