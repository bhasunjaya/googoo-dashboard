<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
    $environment = App::environment();
    return View::make('master');
});

Route::controller('artist', 'ArtistController');
Route::controller('song', 'SongController');
Route::controller('genre', 'GenreController');
Route::controller('ruangsiar', 'RuangsiarController');
Route::resource('banner', 'BannerResource');
Route::resource('program', 'ProgramResource');

//API
Route::get('api/playlist', 'ApiController@playlist');
Route::get('api/program/change/{id}', 'ApiController@programChange');
Route::get('api/listeners/{id}', 'ApiController@listeners');
Route::get('api/nosong/{id}', 'ApiController@nosong');
