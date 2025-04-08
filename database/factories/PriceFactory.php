<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', '+1 year');

        return [
            'configuration_id' => Configuration::factory(),
            'price' => $this->faker->numberBetween(1000000, 10000000),
            'start_date' => $startDate,
            'end_date' => $this->faker->dateTimeBetween($startDate, '+2 years'),
        ];
    }
}
