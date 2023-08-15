<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;
use App\Models\User;

class VoteController extends Controller
{
    protected $fillable = ['vote_count'];
 
    public function submitVote(Request $request, Singer $singer)
{
    // Update the vote count in the database
    $singer->increment('vote_count');
    
    // Reload the singer model to get the updated vote count
    $singer->refresh();
    
    // Return the updated vote count
    return response()->json(['success' => true, 'vote_count' => $singer->vote_count]);
}


    public function getLiveVotes()
    {
        // Fetch the latest vote counts from the database
        $liveVotes = Singer::select('id', 'vote_count')->get();
        
        // Return the vote counts in JSON format
        return response()->json($liveVotes);
    }

    public function vote(Singer $singer)
    {
        // Get the singer's information
        $singerName = $singer->name;

        // Pass the singer's information to the view
        return view('vote', compact('singerName'));
    }

    public function index()
    {
        $users = User::with('singer')->get();

        return view('users-index', ['users' => $users]);
    }
}
