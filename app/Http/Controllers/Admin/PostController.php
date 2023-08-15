<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts= Post::all();
        return view('admin.post.index', compact('posts','user'));
    }
    public function drafts()
    {
        $user = Auth::user();
        $posts= Post::where('status', '1')->get();
        return view('admin.post.draft', compact('posts','user'));
    }
    public function create()
    {
        $user = Auth::user();
        $category= Category::where('status', '0')->get();
        return view('admin.post.create', compact('category','user'));
    }
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = new Post;
        $post->category_id =$data['category_id'];
        $post->name =$data['name'];
        $post->caption =$data['caption'];
        $post->scheduled_at =$data['scheduled_at'];
        $post->slug =  Str::slug($data['name']);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/posts/', $filename);
            $post->image =$filename;
        }
        $post->description = htmlspecialchars_decode($data['description']);
        $post->meta_title =$data['name'];
        $words = str_word_count(strip_tags($post->description), 1);
        $first100Words = implode(' ', array_slice($words, 0, 100));
        
        $post->meta_description = $first100Words;
        $post->meta_keyword =implode(';',$data['meta_keyword']);
        $post->status =$request->status== true ? '1' : '0';
        $post->breaking =$request->breaking== true ? '1' : '0';
        $post->created_by =Auth::user()->id;
        $post->save();
        
        return redirect('admin/posts')->with('message', 'Post Added Successfully');

    }
    public function edit($post_id)
    {
        $user = Auth::user();
        $category= Category::where('status', '0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit', compact('post', 'user','category'));
    }
    public function update(PostFormRequest $request, $post_id)
    {
        $user = Auth::user();
        $data= $request->validated();
        $post = Post::find($post_id);
        $post->category_id =$data['category_id'];
        $post->name =$data['name'];
        $post->scheduled_at =$data['scheduled_at'];
        $post->caption =$data['caption'];
        $post->slug =  Str::slug($data['name']);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/posts/', $filename);
            $post->image =$filename;
        }
        $post->description =$data['description'];
        $post->meta_title =$data['name'];
        $post->meta_description =$data['meta_description']; 
        $post->meta_keyword =implode(';',$data['meta_keyword']);
        $post->status =$request->status== true ? '1' : '0';
        $post->breaking =$request->breaking== true ? '1' : '0';
        $post->created_by =Auth::user()->id;
        $post->update();
        
        return redirect('admin/posts')->with('message', 'Post Updated Successfully');


    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();        
        return redirect('admin/posts')->with('message', 'Post Deleted Successfully');


    }

}
