<?php

namespace App\Http\Controllers;

use App\Post_Comment;
use Illuminate\Http\Request;
use Auth;
use App\Comment;

class CommentsController extends Controller
{

//    I didn't want to use __construct because it kept redirecting non-logged in users to index
//    I don't plan to have a index page for comments....

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('danger','Please be logged in to post...');
        }
        else {
            $this->validate($request, [
                'comment' => 'regex:/(^[A-Za-z0-9 ]+$)+/|min:1',
            ]);
            $comment = new Comment;

            $comment->post_id=$request->id;
            $comment->user_id=$request->personId;
            $comment->comment = $request->comment;

            //dynamic username change I guess..

            $comment->userName = $request->userName;
            $comment->save();

            $relation = new Post_Comment;

            $relation->post_id = $request->id;
            $relation->comment_id = $comment->id;
            $relation->user_id = $request->personId;
            $relation->save();


        return redirect()->back();
        }
    }
}
