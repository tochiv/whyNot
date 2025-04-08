<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Price;
use Illuminate\Database\Eloquent\Collection;

interface PriceRepositoryInterface
{
    public function all(): Collection;

    public function store(array $data): Price;

    public function show(int $id): Price;

    public function update(int $id, array $data): Price;

    public function delete(int $id): void;
}
