<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *     schema="Price",
 *     title="Цена",
 *     description="Модель цены для комплектации автомобиля",
 *     required={"configuration_id", "price", "start_date", "end_date"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1,
 *         description="ID записи цены"
 *     ),
 *     @OA\Property(
 *         property="configuration_id",
 *         type="integer",
 *         example=10,
 *         description="ID комплектации"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         example=39999.99,
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
 *         example="2024-12-31",
 *         description="Дата окончания действия цены"
 *     )
 * )
 */
class Price extends Model
{
    use HasFactory;

    protected $fillable = ['configuration_id', 'price', 'start_date', 'end_date'];

    public $timestamps = false;

    public function configuration(): BelongsTo
    {
        return $this->belongsTo(Configuration::class);
    }
}
