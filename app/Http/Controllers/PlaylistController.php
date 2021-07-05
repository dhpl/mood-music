<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    function create(Request $request)
    {
        // var_dump($request->all());
        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->description = $request->description;
        $playlist->has_featured = $request->has('has_featured');
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/galeryImages/');
        $image->move($destinationPath, $imageName);
        $playlist->image_cover_name     = $imageName;
        $playlist->save();
        return back()->with('success', 'Create Playlist Success!!!');
    }

    function getPlaylistsFeatured()
    {
        return response()->json([
            'success' => true,
            'message' => 'Get Playlists Success!!',
            'data' => Playlist::all()->where('has_featured', 1)
        ]);
    }
}
