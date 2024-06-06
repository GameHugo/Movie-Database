@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col items-center mt-16 pb-16">
        <img src="https://image.tmdb.org/t/p/original/{{ $movie->backdrop_path }}"
             class="w-1/3"
             alt="{{ $movie->title }} image">
        <h2 class="font-medium text-2xl mt-2">{{ $movie->title }}</h2>
        <div class="flex gap-5 mt-2">
            @foreach($movie->genres as $genre)
                <div class="bg-gray-300 px-2 rounded-lg">
                    <p>{{ $genre->name }}</p>
                </div>
            @endforeach
        </div>
        <p class="mt-2">
            @for ($i = 0; $i < round($movie->vote_average/2); $i++)
                ⭐
            @endfor
            <span class="text-neutral-600">({{ $movie->vote_count }})</span>
        </p>
        <div class="flex w-1/3 mt-5">
            <div class="w-1/2 flex flex-col items-center">
                <p class="font-medium">Overview:</p>
                <p>{{ $movie->overview }}</p>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <p><span class="font-medium">Release date:</span> {{ $movie->release_date }}</p>
                @if($movie->budget == 0)
                    <p><span class="font-medium">Budget:</span> Not available</p>
                @else
                    <p><span class="font-medium">Budget:</span> {{ number_format($movie->budget) }}</p>
                @endif
                @if($movie->revenue == 0)
                    <p><span class="font-medium">Revenue:</span> Not available</p>
                @else
                    <p><span class="font-medium">Revenue:</span> {{ number_format($movie->revenue) }}</p>
                @endif
                @if($movie->runtime == 0)
                    <p><span class="font-medium">Runtime:</span> Not available</p>
                @else
                    <p><span class="font-medium">Runtime:</span> {{ number_format($movie->runtime) }}</p>
                @endif
            </div>
        </div>
        <a class="p-2 rounded bg-amber-300 hover:bg-amber-200 transition mt-5"
            href="https://www.imdb.com/title/{{ $movie->imdb_id }}" target="_blank">View on IMDB</a>
    </div>
@endsection
