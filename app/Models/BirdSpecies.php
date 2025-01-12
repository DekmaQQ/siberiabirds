<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс модели вида птиц.
 */
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

    /**
     * Связь "Многие к одному" с моделью "BirdGenus" (род птицы).
     */
    public function birdGenus(): BelongsTo
    {
        return $this->belongsTo(BirdGenus::class);
    }

    /**
     * Связь "Многие к одному" с моделью "SpeciesPopulationStatus" (статус популяции вида).
     */
    public function speciesPopulationStatus(): BelongsTo
    {
        return $this->belongsTo(SpeciesPopulationStatus::class);
    }

    /**
     * Связт "Один ко многим" с моделью "BirdDetection" (фиксация птицы).
     */
    public function birdDetections(): HasMany
    {
        return $this->hasMany(BirdDetection::class);
    }

    /**
     * Связь "Многие ко многим" с моделью "SpeciesStatus" (статус вида).
     */
    public function speciesStatuses(): BelongsToMany
    {
        return $this->belongsToMany(SpeciesStatus::class)->withTimestamps();
    }
}
