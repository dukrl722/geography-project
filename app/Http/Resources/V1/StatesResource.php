<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class StatesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => Str::upper(Arr::get($this, 'nome')),
            'ibge_code' => Arr::get($this, 'codigo_ibge') ?? Arr::get($this, 'id'),
        ];
    }
}
