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
            ? $request->file('poster')->store('posters', 'uploads')
            : env('APP_URL').'/uploads/default-poster.webp';

        $movie = Film::create([
            'title' => $data['title'],
            'poster_path' => $posterPath,
        ]);

        $movie->genres()->sync($data['genres']);

        return redirect()->route('movies.index');
    }
}
