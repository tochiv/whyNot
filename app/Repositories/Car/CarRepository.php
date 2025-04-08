<?php

declare(strict_types=1);

namespace App\Repositories\Car;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarRepository
{
    public function all(): Collection
    {
        return Car::all();
    }

    public function create(array $data): Car
    {
        return Car::create($data);
    }

    public function show(int $carId): Car
    {
        return Car::findOrFail($carId);
    }

    public function update(int $carId, array $data): Car
    {
        $car = Car::findOrFail($carId);
        $car->update($data);
        return $car;
    }

    public function delete(int $carId): bool
    {
        $car = Car::findOrFail($carId);
        return $car->delete();
    }
}
