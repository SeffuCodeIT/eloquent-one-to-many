<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/create', function () {

    $user = User::findOrFail(1);

//    $post = new post(['title'=>'My first post in laravel', 'body'=>'This is my first post']);
    $user->posts()->save(new post(['title'=>'My first post in laravel', 'body'=>'This is my first post']));

});

Route::get('/read', function () {
    $user = User::findOrFail(1);

//    return $user->posts;
//    dd($user->posts);
//    dd($user);
    foreach ($user->posts as $post) {
        echo $post->title . '<br>';
        echo $post->body . '<br>';
        echo $post->created_at . '<br>';
        echo $post->updated_at . '<br>';
    }
});

Route::get('/update', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->update(['title' => 'New title in laravel update', 'body' => 'New body']);

});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->delete();
});

