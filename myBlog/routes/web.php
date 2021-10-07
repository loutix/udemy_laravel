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
    Route::get('/admin/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/admin/post/{post}/update', 'PostController@update')->name('post.update');


});
