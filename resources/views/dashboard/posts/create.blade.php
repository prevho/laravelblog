<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Posts') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('All Posts') }}
            </x-jet-nav-link>

            <x-jet-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                {{ __('Create  Posts') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}

                <div class="px-4 py-4">
                 {{--  Using blade ui kit here --}}
                <x-form action="{{ route('posts.store') }}" has-files method="post">
                    {{-- <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    <div class="space-y-6">

                    

                    <div>
                        {{-- title --}}
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus autocomplete="title" />
                    <span class="text-xs text-gray-600 mt-2">Maximum Characters : 200</span>
                    <x-jet-input-error for="title" class="mt-2"/>
                    </div>


    
                    <div class="mt-5">
                        {{-- Body --}}
                        <x-jet-label for="body" value="{{ __('Body') }}" />

                        <x-trix name="body" styling="overflow-y-scroll h-96" value=""></x-trix>

                    <span class="text-xs text-gray-600 mt-2">Maximum Characters : 80</span>
                    <x-jet-input-error for="body" class="mt-2"/>
                    </div>

                    <div class="mt-5">
                        {{-- Image--}}
                        <x-jet-label for="image" value="{{ __('Featured Image') }}" />

                        <input type="file" name="image" id="image">

                        <span class="text-xs text-gray-600 mt-2">JPG, PNG, JPEG Allowed only</span>
                        <x-jet-input-error for="image" class="mt-2"/>
                    </div>
                    

                    <div class="mt-5">
                        {{-- schedule--}}
                        <x-jet-label for="published_at" value="{{ __('Schedule Post') }}" />

                        <x-pikaday name="published_at" format="YYYY-MM-DD" />

                        {{-- <input type="date" name="published_at" id="published_at" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full p-3"> --}}

                        <span class="text-xs text-gray-600 mt-2">You can Schedule the post in the future</span>
                        <x-jet-input-error for="published_at" class="mt-2"/>
                    </div>

                    <div class="mt-5">
                        {{-- Category--}}
                        <x-jet-label for="category" value="{{ __('Category') }}" />

                        <select name="category_id" id="" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full p-3">
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-xs text-gray-600 mt-2">Category</span>
                        <x-jet-input-error for="category" class="mt-2"/>
                    </div>

                    <div class="mt-5">
                       {{-- Tags --}}
                       <x-tags :tags="$tags" />
                    </div>

                    <div class="mt-5">
                        {{-- Body --}}
                        <x-jet-label for="description" value="{{ __('Meta Description') }}" />

                        <x-trix name="description" styling="overflow-y-scroll h-40" value=""></x-trix>

                    <span class="text-xs text-gray-600 mt-2">Maximum Characters : 80</span>
                    <x-jet-input-error for="description" class="mt-2"/>
                    </div>

                    <div class="mt-5">
                        <x-jet-button class="my-3">
                            {{ __('Create Post') }}
                        </x-jet-button>
                    </div>

                </div>
    
                    </x-form>
                 {{--    </form> --}}
               </div>

            </div>
        </div>
    </div>
</x-app-layout>
