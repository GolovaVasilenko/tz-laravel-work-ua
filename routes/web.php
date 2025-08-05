<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('genres.index');
});
Route::resource('genres', \App\Http\Controllers\GenreController::class);;
Route::resource('movies', \App\Http\Controllers\FilmController::class);
Route::get('movie/publish', [\App\Http\Controllers\FilmController::class, 'publish']);
