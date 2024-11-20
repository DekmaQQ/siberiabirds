<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BirdOrderResource;

class BirdFamilyResource extends JsonResource
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
            'created_at' => $this->created_ad,
            'updated_at' => $this->updated_at,
            'title' => $this->title,
            'title_latin' => $this->title_latin,
            'description' => $this->description,
            'bird_order' => new BirdOrderResource($this->bird_order_id)
        ];
    }
}