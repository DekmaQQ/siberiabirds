<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс модели род птицы.
 */
class BirdGenus extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'bird_family_id'
    ];

    /**
     * Связь "Многие к одному" с моделью "BirdFamily" (семейство птиц).
     */
    public function birdFamily(): BelongsTo
    {
        return $this->belongsTo(BirdFamily::class);
    }

    /**
     * Связь "Один ко многим" с моделью "BirdSpecies" (вид птицы).
     */
    public function birdSpecies(): HasMany
    {
        return $this->hasMany(BirdSpecies::class);
    }
}
