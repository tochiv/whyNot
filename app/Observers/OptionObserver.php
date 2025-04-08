<?php

declare(strict_types=1);

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class OptionObserver
{
    public function created(): void
    {
        Cache::forget('available_cars');
    }

    public function updated(): void
    {
        Cache::forget('available_cars');
    }

    public function deleted(): void
    {
        Cache::forget('available_cars');
    }
}
