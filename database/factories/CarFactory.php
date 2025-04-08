<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Model S', 'Model 3', 'Model X', 'Model Y', 'Cybertruck',
                'Roadster', 'Semi', 'Atlas', 'Tiguan', 'Polo'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
