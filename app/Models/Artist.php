<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'artist_id',
        'genres', 
        'bio', 
        'spotify_uri',  
        'popularity', 
        'image_url', 
    ];
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    } 
}
