<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function readPost(int $id)
    {

        $person = file_get_contents("https://swapi.dev/api/people/" . $id);
        $person_decoded = json_decode($person, true);


        //get homeworld datas
        $homeworldLink = $person_decoded["homeworld"];
        $homeworld = file_get_contents($homeworldLink);
        $homeworld_decoded = json_decode($homeworld, true);


        //get movies datas
        $movies = [];
        $filmsLink = $person_decoded["films"];
        foreach ($filmsLink as $filmLink) {
            $films = file_get_contents($filmLink);
            $films_decoded = json_decode($films, true);
            array_push($movies, $films_decoded);
        }


        //get species data
        $species = [];
        $speciesLink = $person_decoded["species"];
        foreach ($speciesLink as $singleSpecies) {
            $specie = file_get_contents($singleSpecies);
            $specie_decoded = json_decode($specie, true);
            array_push($species, $specie_decoded);
        }

        $vehicles = [];

        $vehiclesLink = $person_decoded["vehicles"];
        foreach ($vehiclesLink as $vehicleLink) {
            $vehicle = file_get_contents($vehicleLink);
            $vehicle_decoded = json_decode($vehicle, true);
            array_push($vehicles, $vehicle_decoded);
        }

        $starshipsLink = $person_decoded["starships"];
        foreach ($starshipsLink as $starshipLink) {
            $starship = file_get_contents($starshipLink);
            $starship_decoded = json_decode($starship, true);
            array_push($vehicles, $starship_decoded);
        }

        // dd($homeworld_decoded, $movies);


        $comments = DB::table('comments')->where('people_id', $id)->get();
        // dd($id, $comments);

        return view('post', [
            'title' => 'Post N°',
            'id' => $id,
            'person' => $person_decoded,
            'homeworld' => $homeworld_decoded,
            'movies' => $movies,
            'species' => $species,
            'vehicles' => $vehicles,
            'comments' => $comments
        ]);
    }
}
