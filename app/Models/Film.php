<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'film_name',
        'status',
        'poster'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_films', 'film_id', 'genre_id');
    }

}
