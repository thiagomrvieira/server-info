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
            'ram' => [
                'capacity' => explode(" ", $this->ram)[0],
                'type' => explode(" ", $this->ram)[1]
            ],
            'hdd' => [
                'capacity' => explode(" ", $this->hdd)[0],
                'type' => explode(" ", $this->hdd)[1]
            ],
            'location' => [
                'name' => explode(" ", $this->hdd)[0],
                'code' => explode(" ", $this->hdd)[1]
            ],
            'price' => $this->price,
        ];

    }
}
