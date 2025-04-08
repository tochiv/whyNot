<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Автопилот', 'Премиум аудио', 'Люк', 'Кожаные сиденья',
                'Подогрев сидений', 'Вентиляция сидений', 'Матовое покрытие',
                'Спортивные диски', 'Полный привод', 'Пакет безопасности'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
