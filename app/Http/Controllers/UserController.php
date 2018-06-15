<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use App\Personal;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return "Something went wrong :P";
    }

    public function show($id)
    {
        //maybe delete
//        //I wanted to explore this method
//        //I know its unpractical to force users to submit a bio
//        //But this is all for practice
//
//        $check = DB::table('personals')
//            ->where('user_id', '=',$id)->first();
//
//        //I know this is an ugly way, but I kinda wanted to do it this way...
//        //Its not a bug or lazy programming, its a feature !!! /s
//
//        if(is_null($check)) {
//            if(!Auth::check() or Auth::user()->id != $id)
//            {
//                return redirect()->back()->with('danger','That user does not have a personal account yet...');
//            }
//            return view('user.create');
//        }

        $personal = User::with('personal')->find($id);
        return view('user.details')->with('personal',$personal);
    }

    public function create()
    {
        $personal = User::with('Personal')->find(Auth::user()->id);
        return view('user.editDetails')->with('personal',$personal);
    }

    public function store(Request $request)
    {
//        {--Maybe delete--}
//        $this->validate($request,[
//            'description'=>'nullable|regex:/(^[A-Za-z0-9 ]+$)+/|min:1',
//        ]);
//        $userId = Auth::id();
//
//        $personal = New Personal;
//        $personal ->user_id = $userId;
//        $personal ->bio = $request->input('description');
//
//        $personal ->save();
//
//
//        return redirect('/contents')->with('success','Post created!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description'=>'nullable|regex:/(^[A-Za-z0-9 ]+$)+/|min:1',
        ]);
        $personal = Personal::find($id);
        $personal ->bio = $request->input('text');
        $personal ->save();

        $userId = User::find($personal->user_id);
        if($request->input('userName')!=$userId->userName)
        {
            $this->validate($request,[
            'userName' => 'required|string|unique:users|max:25|min:2'
            ]);
            $userId->userName = $request->input('userName');
            $userId->save();
        }

        return redirect('/users/{{$userId->username}}')->with('success','Profile has been updated!');
    }

}
