<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contents','ContentsController');

Route::resource('posts','PostsController');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts/create','PostsController@create');
    Route::get('comments','CommentsController@store');
    Route::get('comments','CommentsController@destroy');
});

Route::resource('users','UserController');

Route::get('check/{id}','UserController@userSearch');


Route::resource('comments','CommentsController');

Route::post('upvote/{id}',[
    'uses' => 'Vote@upvote'
]);
Route::post('downvote/{id}',[
    'uses' => 'Vote@downvote'
]);

Route::get('admin', function(){
    //dummy data
    $users = [];
   return view('admin')->with('users',$users);
});

Route::post('query',[
    'uses'=>'QueryController@search'
]);