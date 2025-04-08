<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Price;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="PriceUpdateRequest",
 *     required={"price", "start_date", "end_date"},
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         example=47000,
 *         description="Цена"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         type="string",
 *         format="date",
 *         example="2024-06-01",
 *         description="Дата начала действия цены"
 *     ),
 *     @OA\Property(
 *         property="end_date",
 *         type="string",
 *         format="date",
 *         example="2025-01-01",
 *         description="Дата окончания действия цены"
 *     )
 * )
 */
class PriceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'price' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }
}
