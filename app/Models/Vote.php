<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable=[
        'event_id',
        'voter_id',
        'singer_id',
    ];
    public function voters(){
        return $this->hasMany(Voter::class);
    }
}
