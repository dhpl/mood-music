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

    protected $hidden = ['created_at', 'updated_at', 'show'];

    protected $table = 'on_boarding';
}
