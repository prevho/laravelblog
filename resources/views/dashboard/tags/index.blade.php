<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Tags') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            <x-jet-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.index')">
                {{ __('All Tags') }}
            </x-jet-nav-link>

            <x-jet-nav-link href="{{ route('tags.create') }}" :active="request()->routeIs('tags.create')">
                {{ __('Create  Tags') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-9">
        <x-ui.alerts />
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}

                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-bold text-gray-500 bg-gray-200">
                        <tr>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                SERIAL
                            </th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                ID
                            </th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                NAME
                            </th>
                            
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                CREATED DATE
                            </th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                UPDATED DATE
                            </th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                ACTIONS
                            </th>
                        </tr>

                    </thead>
                    <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                        @foreach ($tags as $key => $tag)
                            
                        
                        <tr>
                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $key + 1 }}
                            </td>
    
                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $tag->id }}
                            </td>
    
                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $tag->name }}
                            </td>
    
                            
    
                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $tag->created_at->format('d / M / Y') }}
                            </td>
    
                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $tag->updated_at->format('d / M / Y') }}
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                
                                {{-- heroicons for SVG --}}
                          
                                <div class="flex justify-between space-x-5">
                                    <a href="{{ route('tags.edit', $tag->slug) }}" class="p-1 border-2 border-indigo-200 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                      </svg></a>
    
    
                                    <form action="{{ route('tags.delete', $tag->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="p-1 border-2 border-red-200 rouned-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                              </svg>
                                        </button>
                                    </form>
    
    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                
            </div>
        </div>
    </div>
</x-app-layout>
