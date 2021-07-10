<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnBoarding extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url'
    ];

    protected $appends = ['image_url'];

    protected $hidden = ['created_at', 'updated_at', 'show'];

    protected $table = 'on_boarding';

    public function getImageUrlAttribute()
    {
        return $this->image_url = asset('/storageImages/' . $this->image_name);
    }

}
