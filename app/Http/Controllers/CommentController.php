<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->post();

        $lastname = $data["lastname"];
        $firstname = $data["firstname"];
        $email = $data["email"];
        $content = $data["content"];
        $id = $data["item_id"];

        $comment = new Comment();
        $comment->firstname = $firstname;
        $comment->lastname = $lastname;
        $comment->email = $email;
        $comment->content = $content;
        $comment->people_id = $id;
        $comment->save();

        return redirect()->route('blog.people', $id);
    }

    public function delete(Request $request)
    {
        $commentId = $request->get('comment_id');
        $peopleId = $request->get('people_id');

        DB::table('comments')->where('id', $commentId)->delete();

        return redirect()->route('blog.people', $peopleId);
    }

    public function edit(Request $request)
    {
        $commentId = $request->get('comment_id');
        $commentToEdit = DB::table('comments')->where('id', $commentId);

        if($request->method() == 'POST'){
            echo 'coucou etienne c maman';
        }

        return view('edit', [
            'comment' => $commentToEdit,
            'commentId' => $commentId
        ]);
    }
}
