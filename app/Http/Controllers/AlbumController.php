<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\Admin\AlbumFormRequest;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return view('dashboard.albums.index', compact('albums'));
    }

    public function create()
    {
        return view('dashboard.albums.create');
    }
   
    public function store(AlbumFormRequest $request)
    {
        $data = $request->validated();
        $album = new Album;
        $album->date =$data['date'];
        $album->name =$data['name'];
        $album->venue =$data['venue']; 
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/albums/', $filename);
            $album->image =$filename;
        }
        $album->description = htmlspecialchars_decode($data['description']);  
        $album->save();
        
        return redirect('admin/albums')->with('message', 'album Added Successfully');

    }
    
  
    public function update(AlbumFormRequest $request, $album_id)
    {
        $user = Auth::user();
        $data= $request->validated();
        $album = Album::find($album_id);
        $album->venue =$data['venue'];
        $album->name =$data['name'];
        $album->date =$data['date']; 
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/albums/', $filename);
            $album->image =$filename;
        }
        $album->description =$data['description']; 
        $album->update();
        
        return redirect('admin/albums')->with('message', 'album Updated Successfully');


    }

    public function edit(Album $album)
    {
        return view('dashboard.albums.edit', compact('album'));
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Album deleted successfully.');
    }
}
