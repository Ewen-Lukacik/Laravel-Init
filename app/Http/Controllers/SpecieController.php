<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecieController extends Controller
{
    public function readSpecies(Request $request, int $id)
    {

        $species = file_get_contents('https://swapi.dev/api/species/' . $id);
        $species_decoded = json_decode($species, true);

        return view('species', [
            'title' => "species",
            'specie' => $species_decoded
        ]);
    }
}
