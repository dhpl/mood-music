<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Sing;
use Illuminate\Http\Request;
use wapmorgan\Mp3Info\Mp3Info;

class SingController extends Controller
{

    public function index()
    {
        return view('admin.sings', [
            "title" => 'Sings',
            'playlists' => Playlist::all()
        ]);
    }

    public function create(Request $request)
    {
        $sing = new Sing();
        $sing->name = $request->name;
        $sing->singer = $request->singer_name;
        $sing->active = $request->has('active');
        $sing->playlist_id = $request->playlist;
        /// File MP3
        $file = $request->file;
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/storageAudios/');
        $file->move($destinationPath, $fileName);
        $sing->file_name = $fileName;
        /// File Image
        $fileImage = $request->file_image;
        $imageName = time() . '.' . $fileImage->getClientOriginalExtension();
        $destinationPath = public_path('/storageImages/');
        $fileImage->move($destinationPath, $imageName);
        $sing->image_name = $imageName;
        // $audioInfo = new Mp3Info($fileName, true);
        $sing->duration = 0;
        $sing->save();
        return back()->with('success', 'Create Sing Success!!!');
    }

    public function getSings(int $playlistID)
    {
        $sings = Sing::all()->where('playlist_id', $playlistID);
        return response()->json([
            'success' => true,
            'message' => 'Get Sings Success!!',
            'data' => $sings->values()
        ]);
    }

    public function listSings()
    {
        return view('admin.list_sings', [
            'sings' => Sing::all(),
        ]);
    }

    function allSings()
    {
        return response()->json([
            'success' => true,
            'message' => 'Get Playlists Newest Success!!',
            'data' => Sing::orderBy('created_at', 'DESC')->get()->values()
        ]);
    }
}
