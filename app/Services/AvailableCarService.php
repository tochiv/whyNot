<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\Car\AvailableCarResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AvailableCarService
{
    public function getAvailableCars(): AnonymousResourceCollection
    {
        return Cache::remember('available_cars', now()->addMinutes(10), function () {
            $now = Carbon::now();

            $cars = Car::whereHas('configurations.prices', function ($q) use ($now) {
                $q->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now);
            })
                ->with([
                    'configurations' => function ($q) use ($now) {
                        $q->whereHas('prices', function ($query) use ($now) {
                            $query->where('start_date', '<=', $now)
                                ->where('end_date', '>=', $now);
                        })
                            ->with([
                                'options:id,name',
                                'prices' => function ($q) use ($now) {
                                    $q->where('start_date', '<=', $now)
                                        ->where('end_date', '>=', $now)
                                        ->orderBy('start_date', 'desc');
                                }
                            ]);
                    }
                ])
                ->get()
                ->filter(function ($car) {
                    return $car->configurations->isNotEmpty();
                })
                ->values();

            return AvailableCarResource::collection($cars);
        });
    }
}
