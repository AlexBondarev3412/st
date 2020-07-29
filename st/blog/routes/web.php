<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{user}', 'HomeController@index')->where('user', '[0-9]+');
Route::get('/comment/{id}/del', 'CommentsController@destroy')->where('id', '[0-9]+');

Route::resource('bookshelf', 'BookshelfControl');
Route::resource('comment', 'CommentsController');

Route::post('/user/{user}/comments', 'CommentsController@store');
