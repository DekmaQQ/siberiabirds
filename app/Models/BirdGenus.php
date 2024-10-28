<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirdGenus extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'bird_family_id'
    ];
}
