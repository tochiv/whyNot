<?php

declare(strict_types=1);

namespace App\Repositories\Option;

use App\Models\Option;
use Illuminate\Database\Eloquent\Collection;

class OptionRepository
{
    public function all(): Collection
    {
        return Option::all();
    }

    public function create(array $data): Option
    {
        return Option::create($data);
    }

    public function show(int $id): Option
    {
        return Option::findOrFail($id);
    }

    public function update(int $id, array $data): Option
    {
        $option = Option::findOrFail($id);

        $option->update($data);

        return $option;
    }

    public function delete(int $id): bool
    {
        $option = Option::findOrFail($id);

        return $option->delete();
    }
}
