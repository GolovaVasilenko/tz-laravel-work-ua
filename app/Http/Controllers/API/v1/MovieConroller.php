<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Film;
use Illuminate\Http\Request;

class MovieConroller extends Controller
{
    public function index()
    {
        $movies = Film::paginate(10);
        return response()->json([
            'success' => true,
            'data' => $movies->items(),
            'pagination' => [
                'total' => $movies->total(),
                'per_page' => $movies->perPage(),
                'current_page' => $movies->currentPage(),
                'last_page' => $movies->lastPage(),
            ],
        ]);
    }

    public function single(int $id)
    {
        $movie = Film::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => MovieResource::collection($movie),
        ]);
    }
}
