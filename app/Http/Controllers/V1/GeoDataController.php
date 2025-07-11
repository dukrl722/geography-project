<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use App\Actions\GeoData\GetStatesFromBrasilAPI;
use App\Actions\GeoData\GetStatesFromIbgeAPI;
use App\Enums\GeoDataProvider;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StatesResource;
use Symfony\Component\HttpFoundation\Response;

class GeoDataController extends Controller
{
    public function index(string $code)
    {
        $data = $this->getSelectedProviderData($code);

        if (empty($data)) {
            return response()->json([
                'message' => 'No data found for the provided code.',
            ], Response::HTTP_NOT_FOUND);
        }

        return StatesResource::collection($data);
    }

    private function getSelectedProviderData(string $code): array
    {
        if (config('services.geo_data.selected') === GeoDataProvider::BRASIL_API->value) {
            return GetStatesFromBrasilAPI::execute($code);
        }

        return GetStatesFromIbgeAPI::execute($code);
    }
}
