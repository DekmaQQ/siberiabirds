<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SpeciesStatus extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function birdSpecies(): BelongsToMany
    {
        return $this->belongsToMany(BirdSpecies::class)->withTimestamps();
    }
}
