<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $genres;
    public $playingMovies;

    public function __construct($popularMovies, $genres, $playingMovies)
    {
        $this -> popularMovies = $popularMovies;
        $this -> genres = $genres;
        $this -> playingMovies = $playingMovies;
    }

    public function popularMovies()
    {
        return $this->formatmovie($this -> popularMovies);
    }

    public function genres()
    {
        return collect($this -> genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function playingMovies()
    {
        return $this->formatmovie($this -> playingMovies);
    }

    private function formatmovie($movies)
    {
        return collect($movies) -> map(function ($movie){
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value){
                return [$value => $this->genres()->get($value)];
            }) -> implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'genres' => $genresFormatted,
            ]) -> only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
    }
}
