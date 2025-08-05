<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $data = $request->validated();
        Genre::create([
            'genre_name' => $data['genre_name']
        ]);
        return redirect()->route('genres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGenreRequest $request, Genre $genre)
    {
        $data = $request->validated();
        $genre->update([
            'genre_name' => $data['genre_name']
        ]);
        return redirect()->route('genres.edit', [$genre]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->deleteOrFail();
        return redirect()->route('genres.index');
    }
}
