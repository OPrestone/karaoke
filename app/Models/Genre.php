<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'name',
        'genre_id',
    ];

    /**
     * Get the artists associated with the genre.
     */
    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_genre', 'genre_id');
    } 
}
