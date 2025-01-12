<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс модели статуса популяции вида.
 */
class SpeciesPopulationStatus extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * Связь "Один ко многим" с моделью "BirdSpecies" (вид птицы).
     */
    public function birdSpecies(): HasMany
    {
        return $this->hasMany(BirdSpecies::class);
    }
}
