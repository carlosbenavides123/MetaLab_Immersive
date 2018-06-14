<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Post;
use App\User;

class ContentsController extends Controller
{

    public function construct(){
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::with('users')->get();
        return view('content')->with('posts',$posts);
    }

}
