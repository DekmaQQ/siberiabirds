<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс модели отряда птиц.
 */
class BirdOrder extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description'
    ];

    /**
     * Связь "Один ко многим" с моделью "BirdFamily" (семейство птиц).
     */
    public function birdFamilies(): HasMany
    {
        return $this->hasMany(BirdFamily::class);
    }
}
