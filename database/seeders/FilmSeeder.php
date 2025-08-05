<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = Film::create([
            'film_name' => 'Example Movie',
            'poster' => env('APP_URL').'/uploads/default-poster.webp',
        ]);

        $movie->genres()->attach([1, 2]);
    }
}
