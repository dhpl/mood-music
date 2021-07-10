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

    protected $appends = ['image_cover_url'];

    protected $table = 'playlists';

    public function getImageCoverUrlAttribute()
    {
        return $this->image_cover_url = asset('/storageImages/' . $this->image_cover_name);
    }
}
