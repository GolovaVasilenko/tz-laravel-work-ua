<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Http\Resources\GenreResource;
use Illuminate\Http\Request;

class GenreConroller extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => GenreResource::collection(Genre::all()),
        ]);
    }

    public function single(int $id)
    {
        $genre = Genre::with('films')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => GenreResource::collection($genre),
        ]);
    }
}
