<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('/admin/albums', function () {
    return view('admin.albums', [
        "title" => 'Albums'
    ]);
})->name('albums');

Route::get('/admin/sings', function () {
    return view('admin.sings', [
        "title" => 'Sings'
    ]);
})->name('sings');

/// Start: On boarding
Route::get('/admin/on-boarding', function () {
    return view('admin.on_boarding', [
        "title" => 'On boarding'
    ]);
})->name('on_boarding');


Route::post('create-on-boarding', 'OnBoardingController@create');
/// End: On Boarding

/// START: Playlists
Route::get('/admin/playlists', function () {
    return view('admin.playlist', [
        'title' => 'Playlists'
    ]);
})->name('playlists');

Route::post('/create-playlist', 'PlaylistController@create');
/// END: Playlists