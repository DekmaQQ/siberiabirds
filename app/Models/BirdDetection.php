<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BirdDetection extends Model
{
    protected $fillable = [
        'agent_id',
        'bird_species_id',
        'latitude',
        'longitude',
        'detection_timestamp',
        'comment',
        'confirmed'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function birdSpecies(): BelongsTo
    {
        return $this->belongsTo(BirdSpecies::class);
    }
}
