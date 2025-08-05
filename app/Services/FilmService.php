<?php

namespace App\Services;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;

class FilmService
{
    public function store(StoreFilmRequest $request)
    {
        $data = $request->validated();
        $posterPath = $request->hasFile('poster')
            ? $request->file('poster')->store('uploads')
            : env('APP_URL').'/uploads/default-poster.webp';

        $movie = Film::create([
            'film_name' => $data['film_name'],
            'status' => $data['status'] ?? 0,
            'poster' => env('APP_URL').'/'.$posterPath,
        ]);

        $movie->genres()->sync($data['genres']);
    }
}
