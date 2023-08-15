<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model
{
    protected $fillable = ['trackId', 'lyrics','start_time_ms'];
}
