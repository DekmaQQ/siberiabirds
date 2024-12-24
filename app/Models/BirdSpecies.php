<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BirdSpecies extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'distribution',
        'migration',
        'habitat',
        'bird_genus_id',
        'species_population_status_id'
    ];

    public function birdGenus(): BelongsTo
    {
        return $this->belongsTo(BirdGenus::class);
    }

    public function speciesPopulationStatus(): BelongsTo
    {
        return $this->belongsTo(SpeciesPopulationStatus::class);
    }

    public function birdDetections(): HasMany
    {
        return $this->hasMany(BirdDetection::class);
    }

    public function speciesStatuses(): BelongsToMany
    {
        return $this->belongsToMany(SpeciesStatus::class)->withTimestamps();
    }
}
