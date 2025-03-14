<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function readMovie(int $id){

        $movie = file_get_contents('https://swapi.dev/api/films/' . $id);
        $movie_decoded = json_decode($movie, true);

        return view('movie', [
            'title' => "movie",
            'movie' => $movie_decoded
        ]);
    }
}
