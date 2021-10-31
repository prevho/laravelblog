<div>
    {{-- <x-checkbox name="featured" /> --}}

     <!-- Rectangular switch -->
<label class="switch block w-12 h-6 duration-150 ease-out rounded-full cursor-pointer transition-color" for="{{ $name.$post->id }}">
    <input wire:model="featured" name="toogle" id="{{ $name.$post->id }}" type="checkbox" class="hidden toggle-checkbox">
    <span class="slider"></span>
  </label>
  
  <!-- Rounded switch -->
  {{-- <label class="switch">
    <input type="checkbox">
    <span class="slider round"></span>
  </label>  --}}
</div>
