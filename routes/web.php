<?php

use App\Services\KaviCms\KaviCMSController;
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

//Route::get('/{slug}', 'App\Http\Controllers\AppController@index')->where('slug', '.*');
Route::get('/{slug}', [KaviCMSController::class , 'index'])->where('slug', '.*');

//Route::get('/leftsidebar', 'App\Http\Controllers\AppController@leftSideBarIndex');
//
//Route::get('/posts', 'App\Http\Controllers\PostController@index');
//Route::get('/posts/create', 'App\Http\Controllers\PostController@create');
//Route::post('/posts', 'App\Http\Controllers\PostController@store');
//Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show');
//
//
//Route::get('/topics', 'App\Http\Controllers\TopicController@index');
//Route::get('/topics/create', 'App\Http\Controllers\TopicController@create');
//Route::post('/topics', 'App\Http\Controllers\TopicController@store');
//Route::get('/topics/{post}', 'App\Http\Controllers\TopicController@show');
//
//
//Route::get('login', function () {
//    return view('login');
//});
//
//Route::get('/register', 'App\Http\Controllers\UserController@create');
//Route::post('/register', 'App\Http\Controllers\UserController@store');
//Route::get('/login', function () {
//    return view('login');
//});
//Route::post('/login', 'App\Http\Controllers\AuthController@login');
