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

Route::get('/', function () {
    return view('welcome');
});
Route::get ('posts','PostsController@index')->name("posts.index")->middleware("auth");
Route::get ('posts/create','PostsController@create')->name("posts.create")->middleware("auth");
Route::post('posts','PostsController@store')->middleware("auth");
Route::get('posts/edit/{id}','PostsController@edit')->name("posts.edit")->middleware("auth");
Route::put('posts/update/{id}','PostsController@update')->name("posts.update")->middleware("auth");
Route::delete('posts/delete/{id}','PostsController@delete')->name("posts.delete")->middleware("auth");
Route::get('posts/{id}','PostsController@show')->name('posts.show')->middleware("auth");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');