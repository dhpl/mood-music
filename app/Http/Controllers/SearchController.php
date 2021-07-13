<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Sing;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->has('text')) {
            $text = $request->get('text');
            return response()->json([
                'success' => true,
                'message' => 'Search!!!',
                'data' => [
                    'playlists' => Playlist::query()
                        ->where('name', 'LIKE', "%{$text}%")
                        ->get()->values(),
                    'sings' => Sing::query()
                        ->where('name', 'LIKE', "%{$text}%")
                        ->orWhere('singer', 'LIKE', "%{$text}%")
                        ->get()->values(),
                ]
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Search Empty!!!',
            'data' => [
                'playlists' => [],
                'sings' => [],
            ]
        ]);
    }
}
