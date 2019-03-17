<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    protected $table = 'about_me';
    protected $casts = [
        'main' => 'array',
        'education' => 'array',
        'experience' => 'array',
        'skills' => 'array',
        'interests' => 'array'
    ];
}
