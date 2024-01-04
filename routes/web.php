<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\AppController@index');

Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create');
Route::post('/posts', 'App\Http\Controllers\PostController@store');
Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show');


Route::get('/topics', 'App\Http\Controllers\TopicController@index');
Route::get('/topics/create', 'App\Http\Controllers\TopicController@create');
Route::post('/topics', 'App\Http\Controllers\TopicController@store');
Route::get('/topics/{post}', 'App\Http\Controllers\TopicController@show');

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});


