<?php

namespace App\Models;

use VanOns\Laraberg\Models\Gutenbergable;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Gutenbergable;

    protected $table = 'posts';

    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'image',
        'image-caption',
        'description',
        'meta_title',
        'scheduled_at',
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
    public function scopeMostRead($query, $days = 7)
{
    return $query->where('created_at', '>=', now()->subDays($days))
        ->orderBy('views', 'desc');
}

}
