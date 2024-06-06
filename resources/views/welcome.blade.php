@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center mt-16 pb-16">
        <div class="flex flex-wrap justify-center gap-10 w-2/3">
            @foreach($movies as $movie)
                @include('components.movie_item')
            @endforeach
        </div>
    </div>
@endsection
