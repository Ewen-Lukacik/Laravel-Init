<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, $page)
    {

        $people = file_get_contents('https://swapi.dev/api/people/?page=' . $page);
        $people_decoded = json_decode($people, true);

        $search = $request->get('search');
        $comments = Comment::where('firstname', 'like', "%$search%")->get();

        $postNames = [];
        foreach($comments as $comment){
            $peopleId = $comment['people_id'];
            $person = file_get_contents("https://swapi.dev/api/people/" . $peopleId);
            $person_decoded = json_decode($person, true);
            array_push($postNames, $person_decoded["name"]);
        }

        $comments_named = [];
        foreach ($comments as $index => $comment) {
            $comments_named[] = [
                'comment' => $comment,
                'name' => $postNames[$index] ?? null,
            ];
        }


        // dd($comments_named);

        $title = 'Accueil';
        return view('blog', [
            'title' => $title,
            'people' => $people_decoded,
            'current_page' => $page,
            'comments' => $comments,
            'post_names' => $postNames,
            'comments_named' => $comments_named,
            'search' => $search
        ]);
    }

}
