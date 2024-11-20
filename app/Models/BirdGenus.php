<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BirdGenus extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'bird_family_id'
    ];

    public function birdFamily(): BelongsTo
    {
        return $this->belongsTo(BirdFamily::class);
    }

    public function birdSpecies(): HasMany
    {
        return $this->hasMany(BirdSpecies::class);
    }
}
