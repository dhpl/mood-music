<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillabled = [
        'name',
        'description',
        'image_cover_name'
    ];

    protected $hidden = [
        'update_at',
        'created_at',
        'has_featured',
        'image_cover_name'
    ];

    protected $appends = ['image_cover_url', 'tracks'];

    protected $table = 'playlists';

    public function getImageCoverUrlAttribute()
    {
        return $this->image_cover_url = asset('/storageImages/' . $this->image_cover_name);
    }

    public function getTracksAttribute()
    {
        return $this->tracks = $this->hasMany('App\Sing', 'playlist_id')->count();
    }
}
