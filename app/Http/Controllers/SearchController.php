<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request){
        $user = Auth::user();
        $category = Category::where('status', '0')->get();
        $search = $request->input('search');
        $posts = Post::query()->where('status','0')
        ->where('name', 'LIKE', "%{$search}%")
        ->where('description', 'LIKE', "%{$search}%")
                    ->get();
                    $most_read = Post::where('status', '0')->orderBy('views', 'DESC')->get()->take(4);
        
        return view('frontend.post.search', compact('posts','most_read','user','category'));
    }
}