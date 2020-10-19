<div class="relative mt-3 md:mt-0" x-data="{ open: true }" @click.away="open = false">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Поиск"
        @keydown = "open = show"
        @focus="open = true"
    >
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
    @if(strlen($search) > 2)
        <div
            class="z-50 absolute bg-gray-600 text-sm rounded w-64 mt-4"
            x-show.transition.opacity="open"
        >
            <ul>
                @if ($searchResults)
                    @foreach($searchResults as $result)
                        @if ($loop->index < 7)
                            <li class="px-3 py-3 border-b border-gray-700">
                                <a href="{{ route('movies.show',$result['id']) }}" class="block hover:bg-gray-700 rounded px-3 py-3 flex items-center">
                                    @if($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-12">
                                    @else
                                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['title'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @else
                    <li class="px-3 py-3 border-b border-gray-700">
                        <div class="block hover:bg-gray-700 rounded px-3 py-3">По запросу "{{ $search }}" ничего не найдено</div>
                    </li>
                @endif
            </ul>
        </div>
    @endif
</div>
