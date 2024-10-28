<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirdOrder extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description'
    ];
}
