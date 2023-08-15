<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table = 'singers';

    protected $fillable = [
        'name',
        'vote_count',
        // Add other fillable attributes here
    ];

    // Relationships or additional methods can be defined here
    public function user()
{
    return $this->belongsTo(User::class);
}

}
