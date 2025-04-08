<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Configuration;
use App\Models\Option;
use App\Models\Price;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cars = Car::factory()->count(2)->create();

        $options = Option::factory()->count(7)->create();

        $cars->each(function ($car) use ($options) {
            $configurations = Configuration::factory()
                ->count(rand(2, 3))
                ->create(['car_id' => $car->id]);

            $configurations->each(function ($configuration) use ($options) {
                $configuration->options()->attach(
                    $options->random(rand(3, 5))->pluck('id')
                );

                Price::factory()
                    ->count(rand(1, 3))
                    ->create(['configuration_id' => $configuration->id]);
            });
        });
    }
}
