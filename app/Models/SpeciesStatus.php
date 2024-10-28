<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeciesStatus extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function birdSpecies()
    {
        return $this->belongsToMany(BirdSpecies::class);
    }
}
