<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable=[
        'event_id',
        'singer_id',
    ];
    public function votes(){
        return $this->belongsTo(Vote::class);
    }
}
