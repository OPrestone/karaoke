<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Song;
use App\Models\Videos;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allusers = User::all();
        $user = Auth::user();
        $songs = Song::orderBy('created_at', 'DESC')->get();
        $artists = Artist::where('image_url', '!=','null')->orderBy('created_at', 'DESC')->get();
        $videos = Videos::orderBy('created_at', 'DESC')->get();
        $events = Event::orderBy('date', 'DESC')->get();

        return view('home', compact('user','allusers','events','songs','videos','artists'));
    }
    public function live()
    {
        $allusers = User::all();
        $user = Auth::user();
        $songs = Song::orderBy('created_at', 'DESC')->get();
        $artists = Artist::where('image_url', '!=','null')->orderBy('popularity', 'DESC')->get();
        $videos = Videos::orderBy('created_at', 'DESC')->get();
        $events = Event::orderBy('created_at', 'DESC')->get();

        return view('live', compact('user','allusers','events','songs','videos','artists'));
    }
}
