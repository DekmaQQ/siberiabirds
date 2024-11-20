<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpeciesPopulationStatus extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function birdSpecies(): HasMany
    {
        return $this->hasMany(BirdSpecies::class);
    }
}
