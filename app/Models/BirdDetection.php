<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Класс модели фиксации птиц.
 */
class BirdDetection extends Model
{
    protected $fillable = [
        'agent_id',
        'bird_species_id',
        'latitude',
        'longitude',
        'detection_datetime',
        'comment',
        'confirmed'
    ];

    /**
     * Связь "Многие к одному" с моделью "User" (пользователь).
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Связь "Многие к одному" с моделью "BirdSpecies" (вид птицы).
     */
    public function birdSpecies(): BelongsTo
    {
        return $this->belongsTo(BirdSpecies::class);
    }
}
