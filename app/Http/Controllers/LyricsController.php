<?php

namespace App\Http\Controllers;

use App\Models\Lyrics;
use Illuminate\Http\Request;

class LyricsController extends Controller
{
    public function index()
    {
        $lyrics = Lyrics::orderBy('start_time_ms')->get();
        return view('lyrics', compact('lyrics'));
    }


    public function store(Request $request)
    {
        $trackId = $request->input('trackId');
        $lyrics = file_get_contents("https://spotify-lyric-api.herokuapp.com/?trackid=$trackId");
        $startTimeMs = $request->input('start_time_ms', 0);

        Lyrics::create([
            'trackId' => $trackId,
            'lyrics' => $lyrics,
            'start_time_ms' => $startTimeMs,
        ]);

        return redirect()->back()->with('success', 'Lyrics saved successfully.');
    }
}
