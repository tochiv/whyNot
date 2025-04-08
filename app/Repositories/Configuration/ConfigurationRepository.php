<?php

declare(strict_types=1);

namespace App\Repositories\Configuration;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\ConfigurationRepositoryInterface;

class ConfigurationRepository implements ConfigurationRepositoryInterface
{
    public function all(): Collection
    {
        return Configuration::with(['car', 'options'])->get();
    }

    public function store(array $data): Configuration
    {
        $configuration = Configuration::create([
            'car_id' => $data['car_id'],
            'name' => $data['name'],
        ]);

        if (!empty($data['option_ids'])) {
            $configuration->options()->attach($data['option_ids']);
        }

        return $configuration->load(['car', 'options']);
    }

    public function show(int $id): Configuration
    {
        return Configuration::with(['car', 'options'])->findOrFail($id);
    }

    public function update(int $id, array $data): Configuration
    {
        $configuration = Configuration::findOrFail($id);

        $configuration->update([
            'car_id' => $data['car_id'],
            'name' => $data['name'],
        ]);

        if (isset($data['option_ids'])) {
            $configuration->options()->sync($data['option_ids']);
        }

        return $configuration->load(['car', 'options']);
    }

    public function delete(int $id): void
    {
        $configuration = Configuration::findOrFail($id);
        $configuration->delete();
    }
}
