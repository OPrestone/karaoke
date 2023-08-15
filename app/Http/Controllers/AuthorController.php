<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function author(Request $request){
        $user = Auth::user();
        $category = Category::where('status', '0')->get();
        $post = Post::query()->where('status','0')
        ->where('created_by', $post->created_by)->get();
        
        return view('frontend.post.authors', compact('post','user','category'));
    }
}