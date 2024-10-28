<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirdSpecies extends Model
{
    protected $fillable = [
        'title',
        'title_latin',
        'description',
        'distribution',
        'migration',
        'habitat',
        'bird_genus_id',
        'species_population_status_id'
    ];

    public function speciesStatuses()
    {
        return $this->belongsToMany(SpeciesStatus::class);
    }
}
