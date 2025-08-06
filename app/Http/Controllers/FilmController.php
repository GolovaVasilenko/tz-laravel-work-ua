<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use App\Models\Genre;
use App\Services\FilmService;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Film::all();
        return view('films.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('films.add', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request, FilmService $service)
    {
        $service->store($request);
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $movie)
    {
        $genres = Genre::all();
        return view('films.edit', ['genres' => $genres, 'movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFilmRequest $request, Film $movie, FilmService $service)
    {
        $service->update($request, $movie);
        return redirect()->route('movies.edit', [$movie]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->deleteOrFail();
        return redirect()->route('movies.index');
    }

    public function publish(Film $movie)
    {
        $movie->update(['status' => 1]);
        return back()->with('status', 'Фильм опубликован');
    }
}
