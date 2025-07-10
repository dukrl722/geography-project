<?php

declare(strict_types = 1);

namespace App\Services\BrasilAPI;

use App\Services\BrasilAPI\Endpoints\Cities;

class BrasilAPIService
{
    public function cities(): Cities
    {
        return app(Cities::class);
    }
}
