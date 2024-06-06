<div class="border w-1/4">
    <input type="text" placeholder="Search for a movie" name="search" wire:model.live.debounce.250ms="search"
           class="w-full h-full p-2 placeholder:text-center">
    @if(!empty($searchMovies))
        <div class="fixed w-1/3">
            <div class="flex flex-wrap justify-center gap-5 bg-gray-400/85 p-2 rounded shadow-xl">
                @foreach($searchMovies as $movie)
                    @if($movie->poster_path != null)
                        <a href="#" class="w-1/5">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}"
                                 alt="{{ $movie->title }} image">
                            <p class="font-medium text-lg">{{ $movie->title }}</p>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
