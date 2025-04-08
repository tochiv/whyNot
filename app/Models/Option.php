<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     schema="Option",
 *     title="Опция",
 *     description="Модель опции автомобиля",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1,
 *         description="ID опции"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Климат-контроль",
 *         description="Название опции"
 *     )
 * )
 */
class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function configurations(): BelongsToMany
    {
        return $this->belongsToMany(Configuration::class, 'configuration_options');
    }
}
