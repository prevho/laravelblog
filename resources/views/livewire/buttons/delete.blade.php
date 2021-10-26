{{-- <div class="p-2 bg-red-200 rounded">
    <a wire:click="confirmPostDeletion" wire:loading.attr="disabled" class="cursor-pointer" href="">
     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
      </svg>
    </a>

    <x-jet-dialog-modal wire:modal="confirmingPostDeletion">
        <x-slot name="title">
            {{  __('Delete Post') }}
        </x-slot>

        <x-slot name="content">
            {{  __('Are sure you want to delete the post?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingPostDeletion')" wire:loading.attr="disabled">
                {{  __('Never Mind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deletePost" wire:loading.attr="disabled">
                {{  __('Delete Post') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div> --}}



<div class="p-2 bg-red-300 rounded">
    <a wire:click="confirmPostDeletion" wire:loading.attr="disabled" class="cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </a>


    <x-jet-dialog-modal wire:model="confirmingPostDeletion">
        <x-slot name="title">
            {{ __('Delete Post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your this post?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingPostDeletion')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deletePost" wire:loading.attr="disabled">
                {{ __('Delete Post') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
