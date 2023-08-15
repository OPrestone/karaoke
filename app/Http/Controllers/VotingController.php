<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use App\Models\Vote;
use App\Models\Event;
use App\Models\Voter;
use App\Models\Artist;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\VotingFormRequest;



class VotingController extends Controller
{
    public function index()
    {
        $events = Event:: all();
        $songs = Song:: all();
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.events.index', compact('events','artists','songs'));
    }
    public function rate()
    {
        $events = Event:: all();
        $songs = Song:: all();
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.voting.rate', compact('events','artists','songs'));
    }
    public function create($event_id)
    {
        $registration = Registration::where('event_id', $event_id)->paginate(10);
        $votecount = Vote::where('event_id', $event_id)->first();
        $votes = Voter::where('event_id', $event_id)->first();
        $events = Event:: all();
        $songs = Song:: all();
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        $singers = Registration::orderBy('created_at', 'DESC')->paginate(10);
        $event = Event::find($event_id);
        return view('frontend.voting.create', compact('events','event','artists','songs','singers','registration','votecount','votes'));
    }
    public function store(VotingFormRequest $request)
    {
        try{

            $data=$request->validated();
            $vote = Vote::where('event_id',$data['event_id'])
                        ->where('singer_id',$data['singer_id'])
                        ->first();
                        $votercheck = Voter::where('event_id',$data['event_id'])
                        ->where('singer_id',$data['singer_id'])
                        ->where('voter_id',Auth::user()->id)
                        ->first();
                        if(is_null($votercheck)){
                            if(is_null($vote))
                            {
                                $vote = new Vote();
                                $vote->event_id =$data['event_id'];
                                $vote->singer_id =$data['singer_id'];
                                $vote->votes = $data['rating'];
                                $vote->vote_count=1;
                                $result=$vote->save();
                            }
                        else
                            {
                                $vote->increment('votes',$data['rating']);
                                $vote->increment('vote_count');
                                $result =$vote->save();
                            }
                        if($result)
                            {
                                $voter = new Voter();
                                $voter->event_id =$data['event_id'];
                                $voter->singer_id =$data['singer_id'];
                                $voter->comment =$data['comment'];
                                $voter->voter_id =Auth::user()->id;
                                $voter->votes= $data['rating'];
                                $voter->vote_id = $vote->id;
                                $voter->save();
                                return redirect('/events')->with('message','Vote added successfully');
                            }
                        }
else{
    return back()->with('message','You cant Vote for the same singer twice');

}



        }
        catch(\Exception $e)
        {
            return redirect('/events')->with('message',$e->getMessage());
        }


    }


    public function edit($registration_id)
    {
$registration = Registration::find($registration_id);
return view('dashboard.voting.edit', compact('registration'));
    }
    public function update(VotingFormRequest $request, $registration_id)
    {
$data=$request->validated();
$registration =  Registration::find($registration_id);
$registration = new Registration;
$registration->event_id =$data['event_id'];
$registration->user_id =Auth::user()->id;
$registration->song_id =$data['song_id'];

$registration->save();

return redirect('/events')->with('message','registration updated successfully');

    }



public function destroy($event_id)
{
    $event = Event::find($event_id);
    if($event)
    {
        $destination ='uploads/events/'.$event->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $event->delete();
        return redirect('admin/events')->with('message','Event deleted successfully');

    }
    else
    {
        return redirect('admin/events')->with('message','Event id not found');

    }
}
}
