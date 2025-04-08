<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigurationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'car_id' => Car::factory(),
            'name' => $this->faker->randomElement([
                'Стандарт', 'Комфорт', 'Люкс', 'Премиум', 'Спорт'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
