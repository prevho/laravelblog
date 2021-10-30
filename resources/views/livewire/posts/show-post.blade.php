<div class="grid grid-cols-4 gap-8">

    {{-- Mian Content --}}

    <div class="col-span-3 space-y-4">
        @foreach($posts as $key => $post)
            <div class="bg-indigo">
                <x-blog.post :post="$post" />
            </div>
        @endforeach

        <div class="p-2">
            {{-- pagination --}}
            {{ $posts->links() }}
       </div>
    </div>
    

    {{-- Side Navigation --}}

    <div class="space-y-8">
        <div class="flex items-center">

            {{-- Sorting --}}
            <h2 class="mr-4">Sort:</h2>
            <div class="space-x-4">
                <button wire:click="sortBy('recentAsc')" class="{{ $selectedSortedBy == 'recentAsc' ? 'bg-indigo-500 text-white' : '' }} p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                      </svg>
                      </svg>
                </button>
                <button wire:click="sortBy('recentDesc')" class="{{ $selectedSortedBy == 'recentDesc' ? 'bg-indigo-500 text-white' : '' }} p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                      </svg>
                </button>
            </div>
        </div>

        {{-- Categories --}}
        <div>
            <div class="p-2 mb-2 text-white bg-indigo-500">
                <h2 class="">Categories</h2>
            </div>
            <div class="flex flex-col items-start">
                @foreach($categories as $key => $category)
                <button wire:click="toggleCategory('{{ $category->id }}')" class="{{ $selectedCategory == $category->id ? 'bg-indigo-500 text-white focus:outline-none' : '' }} p-2">
                    {{ $category->name }}
                </button>
            @endforeach
            </div>
        </div>

       
    </div>
</div>