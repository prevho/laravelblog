@if(session()->has('message'))

<div 
    x-data="{open: true}" 
    x-init="setTimeout(() => {open = false }, 3000)" 
    x-show="open" 
    x-transition:enter="transition duration-500 transform ease-out" 
    x-transition:enter-start="opacity-1" 
    x-transition:leave="transition durantion-500 transform ease-in" 
    x-transition:leave-end="opacity-0" class="flex items-center p-2 mb-4 text-white mt-5 bg-blue-600 rounded">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>

    <span>
        {{ session('message') }}
    </span>
</div>
@endif

@if(session()->has('error'))

<div 
    x-data="{open: true}" 
    x-init="setTimeout(() => {open = false }, 3000)" 
    x-show="open" 
    x-transition:enter="transition duration-500 transform ease-out" 
    x-transition:enter-start="opacity-1" 
    x-transition:leave="transition durantion-500 transform ease-in" 
    x-transition:leave-end="opacity-0" class="flex items-center p-2 mb-4 text-white mt-5 bg-blue-600 rounded">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>

    <span>
        {{ session('error') }}
    </span>
</div>
@endif