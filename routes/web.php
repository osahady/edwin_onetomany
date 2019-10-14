<?php

use App\Post;
use App\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', function(){
    $user = User::findOrFail(1);
    $post = new Post(['title'=> 'my first post', 'body' => 'I love laravel']);
    $user->posts()->save($post);
});

Route::get('/update', function(){
    $user = User::find(1);
    // $user->posts()->whereId(1)->update(['title'=> 'I love laravel', 'body'=>'This is awesome, thank you']);

    $user->posts()->where('id', '=' ,2)->update(['title'=> 'I love laravel2', 'body'=>'This is awesome2, thank you2']);
});

Route::get('/delete', function(){
    $user = User::find(1);
    $user->posts()->whereId(1)->delete();
});