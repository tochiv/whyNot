<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     schema="Configuration",
 *     description="Модель комплектации автомобиля",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=10,
 *         description="ID комплектации"
 *     ),
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
 *         property="car",
 *         ref="#/components/schemas/Car"
 *     ),
 *     @OA\Property(
 *         property="options",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Option")
 *     ),
 *     @OA\Property(
 *         property="current_price",
 *         ref="#/components/schemas/Price"
 *     )
 * )
 */
class Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'name'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'configuration_options');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function currentPrice(): HasOne
    {
        return $this->hasOne(Price::class)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }
}
