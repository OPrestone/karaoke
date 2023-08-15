<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\User;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\RegistrationFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class RegistrationController extends Controller
{
    public function index()
    {
        $events = Event:: all();
        $songs = Song:: all();
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.events.index', compact('events','artists','songs'));
    }
    public function create($event_id)
    {
        $events = Event:: all();
        $songs = Song:: all();
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        $event = Event::find($event_id);
        return view('frontend.registrations.create', compact('events','event','artists','songs'));
    }
    public function store(RegistrationFormRequest $request)
    {
$data=$request->validated();
$registration = new Registration;
$registration->event_id =$data['event_id'];
$registration->user_id =Auth::user()->id;
$registration->song_id =$data['song_id'];
$registration->save();

return redirect('/events')->with('message','registration added successfully');

    }


    public function edit($registration_id)
    {
$registration = Registration::find($registration_id);
return view('dashboard.registrations.edit', compact('registration'));
    }
    public function update(RegistrationFormRequest $request, $registration_id)
    {
$data=$request->validated();
$registration =  Registration::find($registration_id);
$registration = new Registration;
$registration->event_id =$data['event_id'];
$registration->user_id =Auth::user()->id;
$registration->song_id =$data['song_id'];

$event->save();

return redirect('/events')->with('message','registration updated successfully');

    }





    public function destroy($registration_id)
    {
        $registration = Registration::find($registration_id);
        $registration->delete();
        return redirect('admin/events')->with('message', 'registration Deleted Successfully');


    }
}
