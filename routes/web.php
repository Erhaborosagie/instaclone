<?php

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

Route::get('/', 'PostController@index');

Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

//Posts
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::post('/posts', 'PostController@store')->name('post.store');
