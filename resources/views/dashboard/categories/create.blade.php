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
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf

                    <div>
                        <small class="mb-4 text-gray-500">
                            Select Parent Category
                        </small>
                        <select name="parent_id" id="" class="w-full mb-6">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div>

                        <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <span class="text-xs text-gray-600 mt-2">Maximum Characters : 80</span>
                    <x-jet-input-error for="name" class="mt-2"/>
                    </div>

                    <div>
                        <x-jet-button class="my-3">
                            {{ __('Create Category') }}
                        </x-jet-button>
                    </div>
    
                    </form>
               </div>

            </div>
        </div>
    </div>
</x-app-layout>
