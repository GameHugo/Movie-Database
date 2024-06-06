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
                <div class="bg-gray-300 px-1 rounded-lg">
                    <p>{{ $genre->name }}</p>
                </div>
            @endforeach
        </div>
        <div class="flex w-1/3 mt-5">
            <div class="w-1/2 flex flex-col items-center">
                <p class="font-medium">Overview:</p>
                <p>{{ $movie->overview }}</p>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <p><span class="font-medium">Release date:</span> {{ $movie->release_date }}</p>
                <p><span class="font-medium">Budget:</span> {{ number_format($movie->budget) }}</p>
                <p><span class="font-medium">Revenue:</span> {{ number_format($movie->revenue) }}</p>
            </div>
        </div>
        <a class="p-2 rounded bg-amber-300 hover:bg-amber-200 transition"
            href="https://www.imdb.com/title/{{ $movie->imdb_id }}" target="_blank">View on IMDB</a>
    </div>
@endsection
