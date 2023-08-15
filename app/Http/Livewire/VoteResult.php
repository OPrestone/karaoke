<?php

namespace App\Http\Livewire;

use App\Models\Song;
use App\Models\User;
use App\Models\Vote;
use App\Models\Voter;
use Livewire\Component;

class VoteResult extends Component
{
    public $user ;
    public $users;
    public $songs;
    public $live_votes;
    public $votes;
    public $user_id;

    public function mount()
    {
        $this->user = User::find($this->user_id);
        $this->users = User::all();
        $this->songs = Song::all();
        $this->live_votes = Voter::where('singer_id', $this->user_id)->take(10)->get();
        $this->votes = Vote::where('singer_id', $this->user_id)->take(1)->get();
    }

    public function render()
    {
        return view('livewire.vote-result');
    }

    public function poll()
    {
        // Fetch updated data or perform actions here
        $this->user = User::find($this->user_id);
        $this->live_votes = Voter::where('singer_id', $this->user_id)->take(10)->get();
        $this->votes = Vote::where('singer_id', $this->user_id)->take(1)->get();
        $this->emit('pollVoteResult'); // Emit the 'pollVoteResult' event to trigger the polling
    }

    public function hydrate()
    {
        // Poll the component every one second (1000 milliseconds) using wire:poll directive
        $this->poll();
    }

    public function refreshVoteResult()
    {
        // This method is triggered when the 'refreshVoteResult' event is emitted
        // You can add any additional logic you need here
        // For example, you can call the poll() method to fetch updated data again
        $this->poll();
    }
}
