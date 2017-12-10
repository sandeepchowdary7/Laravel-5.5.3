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

// Route::get('/home', function () {
//     return view('welcome');
// });

// Route::group(['prefix' => 'v1'], function () {
	
	Route::resource('/albums','AlbumController');
	Route::get('/saveAlbums','AlbumController@saveAlbums');
	Route::delete('/deleteAlbums','AlbumController@deleteAlbums');
	Route::put('/test','AlbumController@test');
	Route::resource('/tracks','TrackController');

	//From Scratch
	Route::resource('/products','ProductController');
//});