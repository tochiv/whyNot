<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Option;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="OptionRequest",
 *     required={"name"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Подогрев сидений",
 *         description="Название опции"
 *     )
 * )
 */
class OptionRequest extends FormRequest
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
