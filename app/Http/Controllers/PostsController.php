<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class PostController extends Controller

{
    public function search(Request $request)
{
    $searchTerm = $request->input('query');

    // Search in User, Artist, and Song models
    $users = User::where('name', 'like', '%' . $searchTerm . '%')->get();
    $artists = Artist::where('name', 'like', '%' . $searchTerm . '%')->get();
    $songs = Song::where('title', 'like', '%' . $searchTerm . '%')->get();

    return response()->json(compact('users', 'artists', 'songs'));
}
}

