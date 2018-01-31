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

// Admin Auth Routes

Route::get('admin-login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Admin\LoginController@login');
Route::post('admin-logout','Admin\LoginController@logout')->name('admin-logout');
Route::get('admin-logout', 'Admin\LoginController@logout');



// Admin Home Page
Route::get('index','AdminController@index')->name('admin.index');


// Sets Routes
Route::get('/set-create','SetController@create')->name('set.create');
Route::post('/set-create','SetController@store')->name('sets.store');
Route::get('/allsets','SetController@index')->name('sets.index');
Route::delete('/set/{id}','SetController@destroy')->name('set.destroy');
Route::put('/set/{id}','SetController@activation')->name('set.activation');
Route::get('/set/{id}','SetController@edit')->name('set.edit');
Route::patch('/set/{id}','SetController@update')->name('set.update');
Route::get('set/{id}/movies','SetController@set')->name('movies');
Route::get('activesets','SetController@active')->name('sets.active');


// Movies Routes
 Route::get('/movie-create','MovieController@create')->name('movie.create');
 Route::post('/movie-create','MovieController@store')->name('movie.store');
 Route::get('/allmovies','MovieController@index')->name('movie.index');
 Route::put('/movie/{id}','MovieController@activation')->name('movie.activation');
 Route::get('/movie/{id}','MovieController@edit')->name('movie.edit');
 Route::patch('/movie/{id}','MovieController@update')->name('movie.update');
 Route::delete('/movie/{id}','MovieController@destroy')->name('movie.destroy');
 Route::get('activemovies','MovieController@active')->name('movie.active');






