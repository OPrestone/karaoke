<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Album $album)
    {
        $images = $album->images;
        $albums = Album::all();
        $all_images = Image::all();

        return view('dashboard.albums.images.index', compact('album', 'images','albums','all_images'));
    }

    public function create(Album $album)
    { 
        $album = Album::findOrFail($album);
        $albums = Album::all();
        return view('dashboard.albums.images.create', compact('album','albums'));
    }

    public function store(Request $request, Album $album)
    {
        $request->validate([
            'image' => 'required',
            'caption' => 'required',
        ]);

        $image = new Image([
            'image' => $request->file('images')->store('uploads/albums/'),
            'caption' => $request->caption,
        ]);

        $album->images()->save($image);

        return redirect()->route('dashboard.albums.images.index', $album)
            ->with('success', 'Image added successfully.');
    }

    public function edit(Album $album, Image $image)
    {
        return view('dashboard.albums.images.edit', compact('album', 'image'));
    }

    public function update(Request $request, Album $album, Image $image)
    {
        $request->validate([
            'caption' => 'required',
        ]);

        $image->caption = $request->caption;
        $image->save();

        return redirect()->route('dashboard.albums.images.index', $album)
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(Album $album, Image $image)
    {
        $image->delete();

        return redirect()->route('dashboard.albums.images.index', $album)
            ->with('success', 'Image deleted successfully.');
    }
}
