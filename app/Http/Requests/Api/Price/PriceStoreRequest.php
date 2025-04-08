<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Price;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="PriceStoreRequest",
 *     required={"configuration_id", "price", "start_date", "end_date"},
 *     @OA\Property(
 *         property="configuration_id",
 *         type="integer",
 *         example=5,
 *         description="ID комплектации"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         example=45000,
 *         description="Цена"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         type="string",
 *         format="date",
 *         example="2024-04-01",
 *         description="Дата начала действия цены"
 *     ),
 *     @OA\Property(
 *         property="end_date",
 *         type="string",
 *         format="date",
 *         example="2024-10-01",
 *         description="Дата окончания действия цены"
 *     )
 * )
 */
class PriceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'configuration_id' => ['required', 'exists:configurations,id'],
            'price' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }
}
