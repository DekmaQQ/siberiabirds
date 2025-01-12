<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс модели семейства птиц.
 */
class BirdFamily extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'bird_order_id'
    ];

    /**
     * Связь "Многие к одному" с моделью "BirdOrder" (отряд птицы).
     */
    public function birdOrder(): BelongsTo
    {
        return $this->belongsTo(BirdOrder::class);
    }

    /**
     * Связь "Один ко многим" с моделью "BirdGenus" (род птицы).
     */
    public function birdGenera(): HasMany
    {
        return $this->hasMany(BirdGenus::class);
    }
}
