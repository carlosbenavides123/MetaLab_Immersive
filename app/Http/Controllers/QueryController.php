<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');
        $users = DB::table('users')->where('userName','LIKE','%'.$query.'%')->paginate(10);

        return view('admin')->with('users',$users);

    }
}
