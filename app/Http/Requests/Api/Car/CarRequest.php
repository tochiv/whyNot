<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Car;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="CarRequest",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Toyota Camry")
 * )
 */
class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string'
        ];
    }
}
