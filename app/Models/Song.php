<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'track_id',
        'name',
        'song_genres', // Add 'genre' to the $fillable array
        'artist',
        'artist_id',
        'youtube_id',
        'karaokevid',
        'album',
        'spotify_uri',
        'preview_url',
        'duration_ms',
        'popularity',
        'image_url',
        'lyrics',
        'track_name',
        'created_at',
        'updated_at',
    ];

public function artist()
{
    return $this->belongsTo(Artist::class);
}

public function genres()
{
    return $this->belongsToMany(Genre::class);
}
}
