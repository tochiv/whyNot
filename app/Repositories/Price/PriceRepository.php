<?php

declare(strict_types=1);

namespace App\Repositories\Price;

use App\Models\Price;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\PriceRepositoryInterface;

class PriceRepository implements PriceRepositoryInterface
{
    public function all(): Collection
    {
        return Price::with('configuration')->get();
    }

    public function store(array $data): Price
    {
        return Price::create($data)->load('configuration');
    }

    public function show(int $id): Price
    {
        return Price::with('configuration')->findOrFail($id);
    }

    public function update(int $id, array $data): Price
    {
        $price = Price::findOrFail($id);

        $price->update($data);

        return $price->load('configuration');
    }

    public function delete(int $id): void
    {
        $price = Price::findOrFail($id);

        $price->delete();
    }
}
