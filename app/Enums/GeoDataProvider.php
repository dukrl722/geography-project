<?php

declare(strict_types = 1);

namespace App\Enums;

enum GeoDataProvider: string
{
    case BRASIL_API = 'brasil_api';
    case IBGE = 'ibge';
}
