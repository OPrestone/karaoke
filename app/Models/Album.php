<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums'; 

    protected $fillable=[
        'date',
        'venue', 
        'name', 
        'description',
    
    ];    



    public function images()
{
    return $this->hasMany(Image::class);
}

}