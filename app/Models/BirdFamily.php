<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BirdFamily extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'bird_order_id'
    ];

    public function birdOrder(): BelongsTo
    {
        return $this->belongsTo(BirdOrder::class);
    }

    public function birdGenera(): HasMany
    {
        return $this->hasMany(BirdGenus::class);
    }
}
