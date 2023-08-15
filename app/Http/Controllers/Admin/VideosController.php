<?php

namespace App\Http\Controllers\Admin;

use App\Models\Videos;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\VideosFormRequest;


class VideosController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $videos= Videos::where('status','0')->orderBy('created_at', 'DESC')->get();
        return view('dashboard.videos.index', compact('videos','user'));
    }
    public function viewVideo(string $category_slug, string $post_slug)
    {
        $user = Auth::user();
        $category =Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Videos::where('category_id', $category->id)->where('slug', $post_slug)->where('status','0')->first();
            $latest_cate4_2 = Post::where('status', '0')                     ->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC')->get()->skip(1)->take(4);
            $related_posts = Videos::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(3);
            $also_posts = Videos::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(2)->skip(1);
            $latest_posts = Post::where('status','0')->where('id', '<>', $post->id)->orderBy('created_at', 'DESC')->get()->take(4);
            $next = Videos::where('status','0')->where('id', '>', $post->id)->get()->take(1);
            $previous = Videos::where('status','0')->where('id', '<', $post->id)->get()->take(1);
            return view('dashboard.videos.view', compact('post','user','also_posts','next','previous','related_posts', 'latest_posts','latest_cate4_2'));
        }
        else{
            return redirect('/');
        }
    }
        
    public function create()
    {
        $user = Auth::user();
        $category= Category::where('status', '0')->get();
        return view('dashboard.videos.createvideo', compact('category','user'));
    }
    public function store(VideosFormRequest $request)
    {
        $data= $request->validated();
        $post = new Videos;
        $post->category_id =$data['category_id'];
        $post->name =$data['name'];
        $post->slug =  Str::slug($data['slug']);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/videos/', $filename);
            $post->image =$filename;
        }
        $post->description =$data['description'];
        $post->yt_iframe =$data['yt_iframe'];
        $post->meta_title =$data['meta_title'];
        $post->meta_description =$data['meta_description'];
        $post->meta_keyword =$data['meta_keyword'];
        $post->status =$request->status== true ? '1' : '0';
        $post->breaking =$request->breaking== true ? '1' : '0';
        $post->created_by =Auth::user()->id;
        $post->save();
        
        return redirect('admin/videos')->with('message', 'Post Added Successfully');

    }
    public function edit($post_id)
    {
        $user = Auth::user();
        $category= Category::where('status', '0')->get();
        $post = Videos::find($post_id);
        return view('admin.post.editvideo', compact('post', 'user','category'));
    }
    public function update(VideosFormRequest $request, $post_id)
    {
        $user = Auth::user();
        $data= $request->validated();
        $post = Videos::find($post_id);
        $post->category_id =$data['category_id'];
        $post->name =$data['name'];
        $post->slug =  Str::slug($data['slug']);
        if($request->hasfile('image')){
        
            $destination ='uploads/videos/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/videos/', $filename);
            $post->image =$filename;
        }
        $post->description =$data['description'];
        $post->yt_iframe =$data['yt_iframe'];
        $post->meta_title =$data['meta_title'];
        $post->meta_description =$data['meta_description'];
        $post->meta_keyword =$data['meta_keyword'];
        $post->status =$request->status== true ? '1' : '0';
        $post->breaking =$request->breaking== true ? '1' : '0';
        $post->created_by =Auth::user()->id;
        $post->update();
        
        return redirect('admin/videos')->with('message', 'Post Updated Successfully');


    }
    public function destroy($post_id)
    {
        $post = Videos::find($post_id);
        $post->delete();        
        return redirect('admin/videos')->with('message', 'Post Deleted Successfully');


    }

}
