<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $location = explode(' ', $this->location ?? $this->resource);

        return [
            'name' => count($location) == 2 ? $location[0] : $location[0].' '.$location[1],
            'code' => count($location) == 2 ? $location[1] : $location[2],
        ];
    }
}
