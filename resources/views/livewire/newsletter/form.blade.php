<div class="mb-4">
    <x-ui.alerts/>

    <form wire:submit.prevent="formSubmit()">
        
        <div class="container mx-auto max-w-4xl text-left space-y-5">
            {{-- name --}}
            <div>
         

                <x-jet-label for="name" value="{{ __('Name') }}" class="font-bold"/>
                <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>
                <x-jet-input-error for="name" class="mt-2"/>
      
            </div>

            {{-- email --}}
            <div>
         

                <x-jet-label for="email" value="{{ __('Email') }}" class="font-bold"/>
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required/>
                <x-jet-input-error for="email" class="mt-2"/>
      
            </div>

            {{-- submit button --}}
            <div>
         

                <x-jet-button class="my-3">
                    {{ __('Subscribe Now') }}
                </x-jet-button>
      
            </div>
        </div>

    </form>
</div>
