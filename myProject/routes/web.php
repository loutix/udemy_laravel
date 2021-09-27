<?php

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::group(['middleware' => 'web'], function () {


    Route::get('/', function () {
        return redirect('/form');
    });

    Route::view('/test', 'test', ['name' => 'Taylor']);

    //Route::get('/details/{specific_id}', 'PostsController@show');

    Route::resource('check', 'PostsController');

    Route::get('/find', function () {
        $posts = Post::where('id', '>', 0)->orderBy('id', 'desc')->get();
        dd($posts);
    });

    Route::get('/create', function () {
        $newPost = new Post;
        $newPost->title = 'création';
        $newPost->description = 'création';
        $newPost->save();
    });

    Route::get('/create2', function () {
        Post::create([
            'title' => 'titre create',
            'description' => 'descriptio,'
        ]);
    });

    Route::get('/update', function () {

        Post::where('id', 5)->update([
            'title' => 'modif title',
            'description' => 'modif description'
        ]);
    });

    Route::get('/soft-delete', function () {
        $all = Post::withTrashed()->restore();
        return $all;
    });

    Route::get('/user/{id}/post', function ($id) {
        $posts =  User::find(1)->post;

        foreach ($posts as $post) {
            echo $post->title . '<br>';
        }
    });

    Route::get('/user/{id}/role', function ($id) {
        $roles = User::find($id)->roles()->get();
        $roless = $roles->sortByDesc('name');

        foreach ($roless as $role) {
            echo $role->name . '<br>';
        }
    });


    Route::resource('/form', 'PostsController');


    Route::get('/date', function(){

        $date = new DateTime();
        //echo $date->format('d-m-Y');

        '<br>';

        echo Carbon::now()->yesterday();



    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
