<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Collection;

interface ConfigurationRepositoryInterface
{
    public function all(): Collection;

    public function store(array $data): Configuration;

    public function show(int $id): Configuration;

    public function update(int $id, array $data): Configuration;

    public function delete(int $id): void;
}

