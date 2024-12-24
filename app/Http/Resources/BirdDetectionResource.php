<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BirdDetectionResource extends JsonResource
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
            'agent_id' => $this->agent_id,
            'bird_species' => new BirdSpeciesResource($this->birdSpecies),
            'latitude' => $this->latitude,
            'longtitude' => $this->longitude,
            'detection_timestamp' => $this->detection_timestamp,
            'comment' => $this->comment,
            'confirmed' => $this->confirmed
        ];
    }
}