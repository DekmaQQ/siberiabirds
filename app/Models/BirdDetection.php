<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirdDetection extends Model
{
    protected $fillable = [
        'user_id',
        'bird_species_id',
        'coordinates',
        'comment',
        'confirmed'
    ];
}
