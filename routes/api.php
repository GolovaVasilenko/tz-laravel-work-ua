<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\GenreConroller;

Route::prefix('api')->group(function () {

    Route::get('/genres', [GenreConroller::class, 'index']);
    Route::get('/genre/{id}', [GenreConroller::class, 'single']);
    Route::get('/movies', [\App\Http\Controllers\API\v1\MovieConroller::class, 'index']);
    Route::get('movie/{id}', [\App\Http\Controllers\API\v1\MovieConroller::class, 'single']);
});
