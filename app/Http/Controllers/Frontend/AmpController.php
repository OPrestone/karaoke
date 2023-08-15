<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Videos;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AmpController extends Controller
{
    public function index()
    {
        $post = Post::where('status','0')->first();
        $user = Auth::user();
        $videos = Videos::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(5)->skip(1);
        $video = Videos::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(1);
        $all_categories = Category::where('status', '0')->get();        
        $most_read = Post::where('status', '0')->orderBy('views', 'DESC')->get()->take(5);
        $latest_posts = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(5)->skip(1);
        $breaking = Post::where('created_at', '>=', Carbon::now()->subMinutes(30)->toDateTimeString())->orderBy('created_at', 'DESC')->where('breaking', '1')->where('status', '0')->get()->take(1);
        $top = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(1);
        $news_2 = Post::where('status', '0')->where('category_id', '2')->orderBy('created_at', 'DESC')->get()->skip(2)->take(2);
        $entertainment = Post::where('status', '0')->where('category_id', '3')->orderBy('created_at', 'DESC')->get()->skip(0)->take(3);
        $entertainment1 = Post::where('status', '0')->where('category_id', '3')->orderBy('created_at', 'DESC')->get()->skip(0)->take(6)->skip(2);
        $entertainment_2 = Post::where('status', '0')->where('category_id', '3')->orderBy('created_at', 'DESC')->get()->skip(3)->take(2); 
        $sports = Post::where('status', '0')->where('category_id', '4')->orderBy('created_at', 'DESC')->get()->take(4);
        $business = Post::where('status', '0')->where('category_id', '6')->orderBy('created_at', 'DESC')->get()->take(4);
        $opinion = Post::where('status', '0')->where('category_id', '8')->orderBy('created_at', 'DESC')->get()->take(4);
        $features = Post::where('status', '0')->where('category_id', '8')->orderBy('created_at', 'DESC')->get()->take(6)->skip(1);
        $news = Post::where('status', '0')->where('category_id', '2')->orderBy('created_at', 'DESC')->get()->take(2)->skip(1);
        $politics1 = Post::where('status', '0')->where('category_id', '5')->orderBy('created_at', 'DESC')->get()->take(4)->skip(1);
        $politics = Post::where('status', '0')->where('category_id', '5')->orderBy('created_at', 'DESC')->get()->take(1);
        $latest_post_second = Post::where('status','0')->orderBy('created_at', 'DESC')->get()->take(6)->skip(3);
        $latest_home = Post::where('status','0')->orderBy('created_at', 'DESC')->get()->take(6)->skip(2);
        $latest_home_right = Post::where('status','0')->orderBy('created_at', 'DESC')->get()->take(6)->skip(2);
        $comments = DB::table('comments')->count();
        $total = Comment::all()->count();

    return view('frontend.index-amp', compact('user','entertainment1','post','total','videos','video','most_read', 'business', 'politics','politics1','news','comments','all_categories','breaking','sports','entertainment','entertainment_2','opinion','features','news_2','latest_posts','top','latest_post_second', 'latest_home_right','latest_home'));

    }
    public function home()
    {
        $post = Post::where('status','0')->first();
        $user = Auth::user();
        $videos = Videos::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(4);
        $all_categories = Category::where('status', '0')->get();
        $picks = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(3);

    return view('home-amp', compact('user','post','picks','videos'));

    }
    public function viewCategoryPost(string $category_slug)
    {
        $category =Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            $user = Auth::user();
            $post = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->paginate(10);
            $latest_post = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->take(2)->skip(1)->get();
            $latest_post_2 = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->take(2)->skip(3)->get();
            $latest_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->take(1)->get();
            $latest_post_3 = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->take(12)->skip(5)->get();
            return view('frontend.post.index-amp', compact('post','user', 'category','latest_post_3', 'latest_post_2','latest_post','latest_posts'));
        }
        else{
            return redirect('/');
        }
    }
    public function viewVideoPost()
    {
        $post = Videos::where('status','0')->orderBy('created_at', 'DESC');
        if($post)
        {
            $user = Auth::user();
            $post = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10);
            $latest_post = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10)->skip(1);
            $latest_post_2 = Videos::where('status','0')->orderBy('created_at', 'DESC')->take(2)->skip(3)->get();
            $latest_posts = Videos::where('status','0')->orderBy('created_at', 'DESC')->take(1)->get();
            $latest_post_3 = Videos::where('status','0')->orderBy('created_at', 'DESC')->take(12)->skip(5)->get();
            return view('frontend.post.videos-amp', compact('post','user', 'latest_post_3', 'latest_post_2','latest_post','latest_posts'));
        }
        else{
            return redirect('/');
        }
    }
public function viewAuthor(string $category_slug){
    $posts = Post::where('status','0')->first();

        if ($posts) {
            $category =Category::where('slug', $category_slug)->where('status','0')->first();
            $posts = Post::where('created_by', $posts->created_by)
                ->first();

        return view('frontend.post.author-amp', compact('posts','category'));
    }
}

public function viewPost(string $category_slug, string $post_slug)
{
    $user = Auth::user();
    $category =Category::where('slug', $category_slug)->where('status','0')->first();
    if($category)
    {
        $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status','0')->first();
        $post->increment('views');
        $most_read = Post::where('status', '0')->orderBy('views', 'DESC')->get()->take(4);
        $latest_cate4_2 = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->skip(1)->take(4);
        $related_posts = Post::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(3);
        $also_posts = Post::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(2)->skip(1);
        $latest_posts = Post::where('status','0')->where('id', '<>', $post->id)->orderBy('created_at', 'DESC')->get()->take(4);
        $next = Post::where('status','0')->where('id', '>', $post->id)->get()->take(1);
        $previous = Post::where('status','0')->where('id', '<', $post->id)->get()->take(1);
        return view('frontend.post.view-amp', compact('post','user','also_posts','next','previous','related_posts', 'most_read', 'latest_posts','latest_cate4_2'));
    }
    else{
        return redirect('/');
    }
}
public function viewVideo(string $category_slug, string $post_slug)
{
    $user = Auth::user();
    $category =Category::where('slug', $category_slug)->where('status','0')->first();
    if($category)
    {
        $post = Videos::where('category_id', $category->id)->where('slug', $post_slug)->where('status','0')->first();
        $latest_cate4_2 = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->skip(1)->take(4);
        $related_posts = Videos::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(3);
        $also_posts = Videos::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(2)->skip(1);
        $latest_posts = Post::where('status','0')->where('id', '<>', $post->id)->orderBy('created_at', 'DESC')->get()->take(4);
        $next = Videos::where('status','0')->where('id', '>', $post->id)->get()->take(1);
        $previous = Videos::where('status','0')->where('id', '<', $post->id)->get()->take(1);
        return view('frontend.post.video-amp', compact('post','user','also_posts','next','previous','related_posts', 'latest_posts','latest_cate4_2'));
    }
    else{
        return redirect('/');
    }
}
    
    

}
