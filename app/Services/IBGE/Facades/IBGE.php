<?php

declare(strict_types = 1);

namespace App\Services\IBGE\Facades;

use App\Services\IBGE\Endpoints\Cities;
use App\Services\IBGE\IBGEService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Cities cities()
 */
class IBGE extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return IBGEService::class;
    }
}
