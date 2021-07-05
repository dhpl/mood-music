<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/// START: On Boarding
Route::get('on-boarding', 'OnBoardingController@getAllOnBoarding');
/// END: On Boarding



/// START: Playlists
Route::get('playlists-featured', 'PlaylistController@getPlaylistsFeatured');
Route::get('playlists-hot', 'PlaylistController@getPlaylistsHot');
/// END: Playlists