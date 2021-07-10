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

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('/admin/albums', function () {
    return view('admin.albums', [
        "title" => 'Albums'
    ]);
})->name('albums');

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


/// START: Sings
Route::get('/admin/sings', 'SingController@index')->name('sings');

Route::post('/create-sing', 'SingController@create');
/// END: Sings