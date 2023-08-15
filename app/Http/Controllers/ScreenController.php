<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use App\Models\Vote;
use App\Models\Voter;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function viewUser($user_id)
    {
        $user = User::find($user_id);
        $users = User::all();
        $songs = Song::all();
        $leaderboard = Vote::orderBy('votes', 'DESC')->paginate(10);

        return view('screen.users.view', compact('user', 'users', 'songs','leaderboard'));
    }
    public function winnerTop()
    {
        $users = User::all();
        $songs = Song::all();
        $leaderboard = Vote::orderBy('votes', 'DESC')->paginate(10);

        return view('screen.winner', compact( 'users', 'songs','leaderboard'));
    }
    public function voteUser($user_id)
    {


        return view('screen.users.voting',['user_id'=>$user_id]);
    }

}
