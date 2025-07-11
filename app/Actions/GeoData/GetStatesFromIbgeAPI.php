<?php

namespace App\Actions\GeoData;

use App\Services\IBGE\Facades\IBGE;

class GetStatesFromIbgeAPI
{
    public static function execute(string $code): array
    {
        return IBGE::cities()->search($code)->json();
    }
}
