@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Популярные фильмы</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg mt-16 font-semibold">Сейчас смотрят</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($playingMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>
@endsection
