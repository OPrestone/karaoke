<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    
    protected $table = 'videos';

    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'image',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'breaking',
        'created_by'
    
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
