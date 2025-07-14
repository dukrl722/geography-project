<?php

declare(strict_types = 1);

namespace App\Services\IBGE;

use App\Services\IBGE\Endpoints\Cities;

class IBGEService
{
    public function cities(): Cities
    {
        return app(Cities::class);
    }
}
