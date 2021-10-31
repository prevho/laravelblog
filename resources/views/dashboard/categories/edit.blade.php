<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            <x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                {{ __('All Categories') }}
            </x-jet-nav-link>

            <x-jet-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                {{ __('Create  Categories') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}

               <div class="px-4 py-4">
                <form action="{{ route('categories.update', $category->slug) }}" method="post">
                    @csrf
                    @method('put')
    @if(!is_null($category->parent_id))

    <div>
        <small>Parent for Sub Category Only</small>
        <select name="parent_id" class="w-full mb-6 bg-indigo-200 border-none" id="">
            @foreach ($categories as $mainCategory)
                <option value="{{ $mainCategory->id }}" {{ $category->parent_id == $mainCategory->id ? 'selected' : '' }}>{{ $mainCategory->name }}</option>
            @endforeach
        </select>
    </div>

    @endif
                    <div>

                        <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" required autofocus autocomplete="name" />
                    <span class="text-xs text-gray-600 mt-2">Maximum Characters : 80</span>
                    <x-jet-input-error for="name" class="mt-2"/>
                    </div>

                    <div>
                        <x-jet-button class="my-3">
                            {{ __('Update Category') }}
                        </x-jet-button>
                    </div>
    
                    </form>
               </div>

            </div>
        </div>
    </div>
</x-app-layout>
