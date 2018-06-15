<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Vote extends Controller
{
    public function upvote($postId){
        $post = Post::find($postId);
        $post->votes++;
        $post->save();
        return redirect()->back();
    }
    public function downvote($postId){
        $post = Post::find($postId);
        $post->votes--;
        $post->save();
        return redirect()->back();
    }

}
