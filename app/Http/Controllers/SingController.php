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
        $file = $request->file;
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/storageAudios/');
        $file->move($destinationPath, $fileName);
        $sing->file_name = $fileName;
        $sing->duration = 0;
        // $audioInfo = new Mp3Info($fileName, true);
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
}
