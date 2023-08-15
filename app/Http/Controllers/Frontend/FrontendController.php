<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Song;
use App\Models\User;
use App\Models\Event;
use App\Models\Radio;
use App\Models\Artist;
use App\Models\Videos;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
 public function incrementViews(Post $post)
{
    $post->whereDate('updated_at', today())->increment('views');
    $post->views++;
    $post->save();
}

    public function index()
    {


    return view('frontend.index', compact());

    }


    public function home()
    {
        $post = Post::where('status','0')->where('scheduled_at', '<=', now())->first();
        $user = Auth::user();
        $videos = Videos::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(4);
        $all_categories = Category::where('status', '0')->get();
        $picks = Post::where('status', '0')                     ->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC')->get()->take(3);

    return view('home', compact('user','post','picks','videos'));

    }
    public function hoo()
    {
        $user = Auth::user();

        $postdata= Post::all();
        $allusers = User::all();
        $allsongs = Song::orderBy('created_at', 'DESC')->where('lyrics', '!=','null')->get();
        $songs = DB::table('songs')->count();
        $events = DB::table('event')->count();

        return view('frontend.index', compact('user','allusers','events','songs','allsongs'));


    }
    public function viewSong(string $song_id, string $post_slug)
    {
        $user = Auth::user();
        $song =Song::where('id', $song_id)->first();
        if($song)
        {
            $song = Song::where('id', $song->id)->first();
            $latest_songs = Song::where('id', '<>', $song->id)->orderBy('created_at', 'DESC')->get()->take(4);
            $next = Song::where('id', '>', $song->id)->get()->take(1);
            $allsongs = Song::orderBy('created_at', 'DESC')->where('lyrics', '!=','null')->get();
            $songs = Song::orderBy('created_at', 'DESC')->where('lyrics', '!=','null')->get();
            $artists = Artist::where('image_url', '!=','null')->orderBy('created_at', 'DESC')->get();
            $previous = Song::where('id', '<', $song->id)->get()->take(1);

            return view('frontend.songs.view', compact('song','user','next','previous','allsongs', 'latest_songs','artists','songs'));
        }
        else{
            return redirect('/');
        }
    }
    public function searchAll(Request $request)
{
    $searchTerm = $request->input('query');

    $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->take(53)->get();
    $artists = Artist::where('image_url', '!=','null')->where('name', 'like', '%' . $searchTerm . '%')->take(63)->get();
    $songs = Song::where('name', 'like', '%' . $searchTerm . '%')->where('lyrics', '!=','null')->take(53)->get();
    $events = Event::where('name', 'like', '%' . $searchTerm . '%')->take(53)->get();
    $videos = Videos::where('name', 'like', '%' . $searchTerm . '%')->take(53)->get();
    return view('frontend.search', compact('users', 'songs', 'artists','videos','events'))->render();

}
public function searches(Request $request)
    {
        $searchTerm = $request->input('query');

        // Search in User, Artist, and Song models
        $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->get();
        $artists = Artist::where('name', 'like', '%' . $searchTerm . '%')->get();
        $songs = Song::where('name', 'like', '%' . $searchTerm . '%')->get();

        return response()->json(compact('users', 'artists', 'songs'));
    }
    public function songView(string $song_id, string $post_slug)
    {
        $user = Auth::user();
        $song =Song::where('id', $song_id)->first();
        if($song)
        {
            $song = Song::where('id', $song->id)->first();
            $latest_songs = Song::where('id', '<>', $song->id)->orderBy('created_at', 'DESC')->get()->take(4);
            $next = Song::where('id', '>', $song->id)->get()->take(1);
            $allsongs = Song::orderBy('created_at', 'DESC')->get();
            $previous = Song::where('id', '<', $song->id)->get()->take(1);
            $songs = Song::orderBy('created_at', 'DESC')->get();
            $artists = Artist::orderBy('created_at', 'DESC')->get();

            return view('dashboard.songs.view', compact('song','user','next','previous','allsongs', 'latest_songs','artists','songs'));
        }
        else{
            return redirect('/');
        }
    }
    public function viewSongVideo(string $song_id, string $post_slug)
    {
        $user = Auth::user();
        $song =Song::where('id', $song_id)->first();
        if($song)
        {
            $song = Song::where('id', $song->id)->first();
            $latest_songs = Song::where('id', '<>', $song->id)->orderBy('created_at', 'DESC')->get()->take(4);
            $next = Song::where('id', '>', $song->id)->get()->take(1);
            $allsongs = Song::orderBy('created_at', 'DESC')->get();
            $previous = Song::where('id', '<', $song->id)->get()->take(1);

            return view('frontend.songs.view-video', compact('song','user','next','previous','allsongs', 'latest_songs'));
        }
        else{
            return redirect('/');
        }
    }
    public function viewCategoryPost(string $category_slug)
    {
        $category =Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            $user = Auth::user();
            $post = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->where('scheduled_at', '<=', now())->paginate(10);
            $latest_post = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->where('scheduled_at', '<=', now())->take(2)->skip(1)->get();
            $latest_post_2 = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->where('scheduled_at', '<=', now())->take(2)->skip(3)->get();
            $latest_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->where('scheduled_at', '<=', now())->take(1)->get();
            $latest_post_3 = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->where('scheduled_at', '<=', now())->take(12)->skip(5)->get();
            return view('frontend.post.index', compact('post','user', 'category','latest_post_3', 'latest_post_2','latest_post','latest_posts'));
        }
        else{
            return redirect('/');
        }
    }
public function tag(string $meta_keyword)
{
    $user = Auth::user();

     $post = Post::where('meta_keyword', 'LIKE', '%' . $meta_keyword . '%')->where('scheduled_at', '<=', now())
        ->take(10)->get();

    return view('frontend.post.tag', compact('post', 'user', 'meta_keyword'));
}
public function allVideos()
{
    {
        $user = Auth::user();
        $songs = Song::all();
        $artists = Artist::all();
        $post = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10);
        $videos = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10)->skip(1);
        return view('frontend.videos.index', compact('post','user', 'songs', 'artists','videos'));
    }
}


public function viewVideoPost()
{
    $post = Videos::where('status','0')->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC');
    if($post)
    {
        $user = Auth::user();
        $post = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10);
        $latest_post = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10)->skip(1);
        $latest_post_2 = Videos::where('status','0')->orderBy('created_at', 'DESC')->take(2)->skip(3)->get();
        $latest_posts = Videos::where('status','0')->orderBy('created_at', 'DESC')->take(1)->get();
        $latest_post_3 = Videos::where('status','0')->orderBy('created_at', 'DESC')->take(12)->skip(5)->get();
        return view('frontend.post.videos', compact('post','user', 'latest_post_3', 'latest_post_2','latest_post','latest_posts'));
    }
    else{
        return redirect('/');
    }
}

public function videoView()
{
    $video = Videos::where('status','0')->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC');
    if($video)
    {
        $user = Auth::user();
        $video = Videos::where('status','0')->first();
        $latest_videos = Videos::where('status','0')->orderBy('created_at', 'DESC')->paginate(10)->skip(1);
        $songs = Song::orderBy('created_at', 'DESC')->paginate(10)->skip(1);
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10)->skip(1);
        return view('frontend.videos.view', compact('video','user', 'latest_videos','songs','artists'));
    }
    else{
        return redirect('/');
    }
}
public function viewAuthor(string $category_slug){
    $posts = Post::where('status','0')->where('scheduled_at', '<=', now())->first();

        if ($posts) {
            $category =Category::where('slug', $category_slug)->where('status','0')->first();
            $posts = Post::where('created_by', $posts->created_by)->where('scheduled_at', '<=', now())
                ->first();

        return view('frontend.post.author', compact('posts','category'));
    }
}

public function viewPost(string $category_slug, string $post_slug)
{
    $user = Auth::user();
    $category =Category::where('slug', $category_slug)->where('status','0')->first();
    if($category)
    {
        $post = Post::where('category_id', $category->id)          ->where('scheduled_at', '<=', now())->where('slug', $post_slug)->where('status','0')->first();
        $post->increment('views');
        $most_read = Post::where('status', '0')                     ->where('scheduled_at', '<=', now())->orderBy('views', 'DESC')->get()->skip(14)->take(4);
        $latest_cate4_2 = Post::where('status', '0')                     ->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC')->get()->skip(1)->take(4);
        $related_posts = Post::where('category_id', $category->id)->where('scheduled_at', '<=', now())->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(3);
        $also_posts = Post::where('category_id', $category->id)->where('scheduled_at', '<=', now())->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(2)->skip(1);
        $tags = Post::where('category_id', $category->id)->where('id', $post->id)->where('status','0')->get();
        $latest_posts = Post::where('status','0')->where('scheduled_at', '<=', now())->where('id', '<>', $post->id)->orderBy('created_at', 'DESC')->get()->take(4);
        $next = Post::where('status','0')->where('scheduled_at', '<=', now())->where('id', '>', $post->id)->get()->take(1);
        $top = Post::where('status', '0')                     ->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC')->get()->take(1);
        $previous = Post::where('status','0')->where('scheduled_at', '<=', now())->where('id', '<', $post->id)->get()->take(1);
        return view('frontend.post.view', compact('post','top','user','also_posts','next','previous','tags','related_posts', 'most_read', 'latest_posts','latest_cate4_2'));
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
        $latest_cate4_2 = Post::where('status', '0')                     ->where('scheduled_at', '<=', now())->orderBy('created_at', 'DESC')->get()->skip(1)->take(4);
        $related_posts = Videos::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(3);
        $also_posts = Videos::where('category_id', $category->id)->where('id', '<>', $post->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(2)->skip(1);
        $latest_posts = Post::where('status','0')->where('id', '<>', $post->id)->orderBy('created_at', 'DESC')->get()->take(4);
        $next = Videos::where('status','0')->where('id', '>', $post->id)->get()->take(1);
        $previous = Videos::where('status','0')->where('id', '<', $post->id)->get()->take(1);
        return view('frontend.post.video', compact('post','user','also_posts','next','previous','related_posts', 'latest_posts','latest_cate4_2'));
    }
    else{
        return redirect('/');
    }
}



    public function getTodays()
    {
        $categories =  Category::where('navbar_status', '0')->where('status','0')->get(['id'])->pluck('id')->toArray();

        return Post::where('status','0')->where('scheduled_at', '<=', now())
            ->orderBy("created_at","desc")
            ->whereDate('created_at',date("Y-m-d"))
            ->get();
    }

    public function sitemap(Request $request)
    {
        $articles = new Post();
        $sitemap = Post::where('status','0')->where('scheduled_at', '<=', now())
        ->orderBy("created_at","desc")
        ->whereDate('created_at',date("Y-m-d"))
        ->get();
        $categories =  Category::where('navbar_status', '0')->where('status','0')->get();

        //return;
        return response()->view('frontend.sitemap',['sitemap' => $sitemap,'articles'=>$articles,'categories'=> $categories])
            ->header('Content-Type', 'text/xml');
    }

    public function googlenews(Request $request)
    {
        $articles = new Post();
        $googlenews = Post::where('status','0')->where('scheduled_at', '<=', now())
        ->orderBy("created_at","desc")
        ->whereDate('created_at',date("Y-m-d"))
        ->get();
        $categories =  Category::where('navbar_status', '0')->where('status','0')->get();

        //return;
        return response()->view('frontend.googlenews',['googlenews' => $googlenews,'articles'=>$articles,'categories'=> $categories])
            ->header('Content-Type', 'text/xml');
    }
    public function radios()
    {
        $radios = Radio::where('status', '1')->take(1)->get();

        //return;
        return response()->view('frontend.radios',['radios' => $radios]);
    }

    // public function googlenews(Request $request)
    // {
    //     $articles = new Post();
    //     $googlenews = Post::where('status','0')
    //     ->orderBy("created_at","desc")
    //     ->whereDate('created_at',date("Y-m-d"))
    //     ->get();

    //     $categories =  Category::where('navbar_status', '0')->where('status','0')->get();


    //     //return;
    //     return response()->view('frontend.googlenews',['googlenews' => $sitemap,'articles'=>$articles,'categories'=> $categories])
    //         ->header('Content-Type', 'text/xml');
    // }


}
