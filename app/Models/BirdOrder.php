<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BirdOrder extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description'
    ];

    public function birdFamilies(): HasMany
    {
        return $this->hasMany(BirdFamily::class);
    }
}
