<div class="w-7/8 sm:w-1/3 md:w-1/4 2xl:w-1/5 h-max p-2 gap-2 bg-neutral-200 hover:bg-neutral-300 hover:shadow-lg rounded transition flex flex-col items-center">
    <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}"
         alt="{{ $movie->title }} image">
    <h2 class="font-medium text-lg text-center">{{ $movie->title }}</h2>
    <div class="flex justify-between gap-5">
        <p>{{ $movie->release_date }}</p>
        <p>
            @for ($i = 0; $i < round($movie->vote_average/2); $i++)
                ⭐
            @endfor
        </p>
    </div>
    <p class="text-neutral-500">
        @foreach(array_slice(explode(" ", $movie->overview), 0, 10) as $text)
            {{ $text }}
        @endforeach
        @if(count(explode(" ", $movie->overview)) > 10)
            ...
        @endif
    </p>
    <a href="{{ route('movie.show', $movie->id) }}"
       class="p-2 mt-auto mb-1 rounded bg-sky-300 hover:bg-sky-200 transition cursor-pointer">More info</a>
</div>
