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

//Route::get('/', function () {
//    return view('welcome')->name('/LandingPage');
//});

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contents','ContentsController');

Route::resource('posts','PostsController');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts/create','PostsController@create');
});

Route::get('/test/createpost',function(){
    return view('test.createpost');
});

Route::resource('users','UserController');

