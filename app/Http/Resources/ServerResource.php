<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'model' => $this->model,
            'ram' => new ServerSpecsResource($this->ram),
            'hdd' => new ServerSpecsResource($this->hdd),
            'location' => new LocationResource($this->location),
            'price' => $this->price,
        ];
    }
}
