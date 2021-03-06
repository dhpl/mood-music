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

Route::get('/', 'LoginController@checkLogin');

Route::get('/admin', 'LoginController@checkLogin')->name('admin');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    /// START: Sings
    Route::get('/admin/sings',  'SingController@index')->name('sings');
    Route::get('/admin/list-sings', 'SingController@listSings')->name('list-sings');
    Route::post('/create-sing', 'SingController@create');
    /// END: Sings

    /// START: Playlists
    Route::get('/admin/playlists', function () {
        return view('admin.playlist', [
            'title' => 'Playlists'
        ]);
    })->name('playlists');
    Route::get('/admin/list-playlist', 'PlaylistController@listPlaylist')->name('list-playlist');
    Route::post('/create-playlist', 'PlaylistController@create');
    /// END: Playlists

    /// Start: On boarding
    Route::get('/admin/on-boarding', function () {
        return view('admin.on_boarding', [
            "title" => 'On boarding'
        ]);
    })->name('on_boarding');
    Route::post('create-on-boarding', 'OnBoardingController@create');
    Route::get('/admin/list-on-boarding', 'OnBoardingController@listOnBoarding')->name('list-on-boarding');
    /// End: On Boarding

    /// START: Albums
    Route::get('/admin/albums', function () {
        return view('admin.albums', [
            "title" => 'Albums'
        ]);
    })->name('albums');
    /// END: Albums

    /// START: Push Notification
    Route::get('/admin/push-notification', function () {
        return view('admin.push_notification', [
            'title' => 'Push notification'
        ]);
    })->name('push-notification');
    Route::post('/push-notification', 'NotificationController@sendPush');
    /// END: Push Notification

});
