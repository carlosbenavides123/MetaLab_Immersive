<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return 123;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:2|max:50|regex:/(^[A-Za-z0-9 ]+$)+/',
            'description'=>'nullable|regex:/(^[A-Za-z0-9 ]+$)+/|min:1',
            'image' =>'max:1999|image'
        ]);

        $fileNameToStore = 'temp.jpg (2).png';

        if($request->file('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalExtension();

            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' .$extension;

            $path = $request->file('image')->storeAs('public/pictures',$fileNameToStore);
        }




        $post = new Post;
        $post->personId = auth()->user()->id;
        $post->optionalPic = $fileNameToStore;
        $post->userName = auth()->user()->userName;
        $post->title = $request->input('title');
        $post->textArea = $request->input('description');
        $post->votes = 0;

        $post ->save();


        return redirect('/contents')->with('success','Post created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //might need to do a many to many relationship with users
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 123;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
