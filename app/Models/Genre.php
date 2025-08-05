<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'genre_name'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'genre_films', 'genre_id', 'film_id');
    }
}
