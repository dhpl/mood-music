<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sing extends Model
{

    protected $table = 'sings';

    protected $fillable = [
        'name',
        'singer',
        'active',
        'listens',
        'file_name',
        'duration',
        'playlist_id'
    ];

    protected $hidden = [
        'file_name',
        'created_at',
        'updated_at',
        'active',
        'playlist_id'
    ];

    protected $appends = [
        'file_url'
    ];

    public function getFileUrlAttribute()
    {
        return $this->file_url = asset('/storageAudios/' . $this->file_name);
    }

    public function playlist()
    {
        $this->belongsTo('App\Playlist', 'id');
    }
}
