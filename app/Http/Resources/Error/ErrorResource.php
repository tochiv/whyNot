<?php

declare(strict_types=1);

namespace App\Http\Resources\Error;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'error' => $this->resource['error'],
            'message' => $this->resource['message'],
            'status_code' => $this->resource['status_code']
        ];
    }
}
