<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Класс модели статуса вида.
 */
class SpeciesStatus extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * Связь "Многие ко многим" с моделью "BirdSpecies" (вид птицы).
     */
    public function birdSpecies(): BelongsToMany
    {
        return $this->belongsToMany(BirdSpecies::class)->withTimestamps();
    }
}
