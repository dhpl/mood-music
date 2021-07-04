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

    protected $table = 'on_boarding';
}
