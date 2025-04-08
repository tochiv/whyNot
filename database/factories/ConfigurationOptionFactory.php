<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Configuration;
use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigurationOptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'configuration_id' => Configuration::factory(),
            'option_id' => Option::factory(),
        ];
    }
}
