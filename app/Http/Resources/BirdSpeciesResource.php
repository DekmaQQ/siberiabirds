<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BirdSpeciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'title' => $this->title,
            'title_latin' => $this->title_latin,
            'description' => $this->description,
            'distribution' => $this->distribution,
            'migration' => $this->migration,
            'habitat' => $this->habitat,
            'bird_genus' => new BirdGenusResource($this->birdGenus),
            'species_population_status' => new SpeciesPopulationStatusResource($this->speciesPopulationStatus),
            'species_statuses' => SpeciesStatusResource::collection($this->speciesStatuses)
        ];
    }
}