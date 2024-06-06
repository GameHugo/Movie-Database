<div class="w-1/6 h-[650px] p-2 gap-2 border flex flex-col items-center">
    <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}"
         alt="{{ $movie->title }} image">
    <h2 class="font-medium text-lg text-center">{{ $movie->title }}</h2>
    <p>{{ $movie->release_date }}</p>
    <p class="text-neutral-500">
        @foreach(array_slice(explode(" ", $movie->overview), 0, 10) as $text)
            {{ $text }}
        @endforeach
        @if(count(explode(" ", $movie->overview)) > 10)
            ...
        @endif
    </p>
    <a class="p-2 mt-auto mb-1 rounded bg-sky-300 hover:bg-sky-200 transition cursor-pointer">More info</a>
</div>
