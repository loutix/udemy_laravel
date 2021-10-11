<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::get('/admin/post/create', 'PostController@create')->name('post.create');
    Route::post('/admin/post', 'PostController@store')->name('post.store');
    Route::get('/admin/post', 'PostController@index')->name('post.index');
    Route::delete('/admin/post/{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::put('/admin/post/{post}/update', 'PostController@update')->name('post.update');
    Route::get('/admin/post/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');

    route::put('/admin/users/{user}/update', 'UserController@update')->name('user.profile.update');

    route::delete('/admin/users/{user}/delete', 'UserController@destroy')->name('users.destroy');
});

Route::middleware(['role:Admin'])->group(function () {
    route::get('/admin/users', 'UserController@index')->name('users.index');
});

Route::middleware(['auth', 'can:view,user'])->group(function () {
    route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');

});

//meme directire que dans le controller
