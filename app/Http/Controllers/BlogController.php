<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($page)
    {

        $people = file_get_contents('https://swapi.dev/api/people/?page=' . $page);
        $people_decoded = json_decode($people, true);


        $title = 'Accueil';
        return view('blog', [
            'title' => $title,
            'people' => $people_decoded
        ]);
    }
}
