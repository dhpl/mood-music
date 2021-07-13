<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Sing;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $playlists = Playlist::all();
        $sings = Sing::all();
        if ($request->has('text')) {
            $text = $request->get('text');
            return response()->json([
                'success' => true,
                'message' => 'Search Empty!!!',
                'data' => [
                    'playlists' => $playlists->values(),
                    'sings' => $sings->values(),
                ]
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Search Empty!!!',
            'data' => [
                'playlists' => $playlists->values(),
                'sings' => $sings->values(),
            ]
        ]);
    }
}
