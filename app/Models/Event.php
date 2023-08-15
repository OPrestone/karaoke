<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    public $timestamps = false;

    protected $fillable=[
        'date',
        'name',
        'artists',
        'image',
        'main_artist',
        'description',
        'end_time', 
        'start_time',
        'host',
        'external',
        'venue',
        'location',
        'prize',
        'sponsor',
        'group',
        'created_by',
        'pre_reg'
    
    ];        

}
