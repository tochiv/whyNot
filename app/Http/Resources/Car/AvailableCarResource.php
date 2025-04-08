<?php

declare(strict_types=1);

namespace App\Http\Resources\Car;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AvailableCarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'configurations' => AvailableConfigurationResource::collection($this->configurations),
        ];
    }
}
