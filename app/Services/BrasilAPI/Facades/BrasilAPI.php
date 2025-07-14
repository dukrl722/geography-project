<?php

declare(strict_types = 1);

namespace App\Services\BrasilAPI\Facades;

use App\Services\BrasilAPI\BrasilAPIService;
use App\Services\BrasilAPI\Endpoints\Cities;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Cities cities()
 */
class BrasilAPI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BrasilAPIService::class;
    }
}
