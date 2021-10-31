<div class="max-w-7xl mx-auto">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        {{-- main heading with filter --}}
        <div class="flex w-full p-3 space-x-2">

            {{-- search --}}
            <div class="w-3/6">
                <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                </span>

                <input wire:model.debounce.300ms='search' type="text"  class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" placeholder="Search Posts...">
            </div>

            {{-- Order By --}}
            <div class="relative w-1/6">
                <select wire:model='orderBy' class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" id="">
                    <option value="id">ID</option>
                    <option value="title">Title</option>
                    <option value="created_at">Created At</option>
                </select>
            </div>

             {{-- Order Asc --}}
             <div class="relative w-1/6">
                <select wire:model='orderAsc' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="1">Asc</option>
                    <option value="0">Desc</option>
                </select>
            </div>

            {{-- Per Page--}}
            <div class="relative w-1/6">
                <select wire:model='perPage' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>


        {{-- Post Table --}}
        <table class="w-full divide-y divide-gray-200">
            <thead class="font-bold text-white bg-blue-500">
                <tr>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        SERIAL
                    </th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        ID
                    </th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        TITLE
                    </th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        CATEGORY
                    </th>
                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        FEATURED
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
                @foreach ($posts as $key => $post)
                    
                
                <tr>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $key + 1 }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->id }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ Str::limit($post->title, 40, '...') }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->category->name }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        <livewire:buttons.featured :post="$post" :name="'featured'" :key="'featured'.$post->id" />
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->created_at->format('d / M / Y') }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $post->updated_at->format('d / M / Y') }}
                    </td>
                    <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                        
                        {{-- heroicons for SVG --}}
                  
                        <div class="flex justify-start space-x-5">
                            <a href="{{ route('posts.edit', $post->slug) }}" class="p-1 border-2 border-indigo-500 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                              </svg></a>


                           {{-- Pass the post variable too --}}
                            <livewire:buttons.delete :post="$post" :key="$post->id"/>


                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- paginatiom --}}
        <div class="p-2 bg-indigo-300">
            {{ $posts->links() }}
        </div>
    </div>
</div>