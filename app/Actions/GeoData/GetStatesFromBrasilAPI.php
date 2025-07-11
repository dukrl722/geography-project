<?php

declare(strict_types = 1);

namespace App\Actions\GeoData;

use App\Services\BrasilAPI\Facades\BrasilAPI;
use Illuminate\Support\Arr;

class GetStatesFromBrasilAPI
{
    public static function execute(string $code): array
    {
        $data = BrasilAPI::cities()->search($code)->json();

        if (Arr::has($data, 'message')) {
            return [];
        }

        return $data;
    }
}
