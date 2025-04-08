<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Configuration;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ConfigurationRequest",
 *     required={"car_id", "name"},
 *     @OA\Property(
 *         property="car_id",
 *         type="integer",
 *         example=1,
 *         description="ID автомобиля"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Comfort",
 *         description="Название комплектации"
 *     ),
 *     @OA\Property(
 *         property="option_ids",
 *         type="array",
 *         description="Массив ID опций",
 *         @OA\Items(type="integer", example=1)
 *     )
 * )
 */
class ConfigurationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_id' => ['required', 'exists:cars,id'],
            'name' => ['required', 'string', 'max:255'],
            'option_ids' => ['nullable', 'array'],
            'option_ids.*' => ['integer', 'exists:options,id'],
        ];
    }
}
