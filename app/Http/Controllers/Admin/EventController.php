<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\User;
use App\Models\Location;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\EventFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'DESC')->paginate(10);
        return view('dashboard.events.index', compact('events'));
    }
    public function view($event_id)
    {
        $event = Event::find($event_id);
        $events = Event::orderBy('date', 'DESC')->paginate(10);
        $users = User::all();
        $registration = Registration::where('event_id', $event->id)->get();

        $selectedSongs = $registration->pluck('song_id')->unique();
        $songs = Location::whereIn('id', $selectedSongs)->get();

        $registered = User::whereIn('id', $registration->pluck('user_id'))->get();

        return view('dashboard.events.view', compact('event', 'registered', 'events', 'users', 'registration', 'songs'));
    }




    public function qrcode()
    {
        $events = Event::orderBy('date', 'DESC')->paginate(10);
        $users = User:: all();
        return view('dashboard.screen.qrcode', compact('events','users'));
    }
    public function create()
    {
        $county = Location:: all();
        return view('dashboard.events.create', compact('county'));
    }
    public function store(EventFormRequest $request)
    {
$data=$request->validated();
$event = new Event;
$event->name =$data['name'];
$event->location =$data['location'];
$event->venue =$data['venue'];
$event->date =$data['date'];
$event->sponsor =$data['sponsor'];
$event->start_time =$data['start_time'];
$event->host =$data['host'];
$event->prize =$data['prize'];
$event->description =$data['description'];

if($request->hasfile('image')){
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file -> move('uploads/events/', $filename);
    $event->image =$filename;
}
$event->main_artist =$data['main_artist'];
$event->end_time =$data['end_time'];
$event->artists =implode(';',$data['artists']);
$event->external =$request->external== true ? '1' :'0';
$event->pre_reg =$request->pre_reg== true ? '1' :'0';
$event->group =$request->group== true ? '1' :'0';
$event->created_by =Auth::user()->id;
$event->save();

return redirect('admin/events')->with('message','Event added successfully');

    }


    public function edit($event_id)
    {
        $county = Location:: all();
        $event = Event::find($event_id);
    return view('dashboard.events.edit', compact('event','county'));
    }
    public function update(EventFormRequest $request, $event_id)
    {
$data=$request->validated();
$event =  Event::find($event_id);
$event->name =$data['name'];
$event->location =$data['location'];
$event->venue =$data['venue'];
$event->date =$data['date'];
$event->sponsor =$data['sponsor'];
$event->start_time =$data['start_time'];
$event->host =$data['host'];
$event->prize =$data['prize'];
$event->description =$data['description'];

if($request->hasfile('image')){
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file -> move('uploads/events/', $filename);
    $event->image =$filename;
}
$event->main_artist =$data['main_artist'];
$event->end_time =$data['end_time'];
$event->artists =implode(';',$data['artists']);
$event->external =$request->external== true ? '1' :'0';
$event->pre_reg =$request->pre_reg== true ? '1' :'0';
$event->group =$request->group== true ? '1' :'0';
$event->created_by =Auth::user()->id;
$event->save();

return redirect('admin/events')->with('message','Event updated successfully');

    }




    public function destroy($event_id)
    {
        $event = Event::find($event_id);
        $event->delete();
        return redirect('admin/events')->with('message', 'event Deleted Successfully');


    }
}
