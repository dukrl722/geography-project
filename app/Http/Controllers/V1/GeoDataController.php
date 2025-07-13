<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use App\Actions\GeoData\GetStatesFromBrasilAPI;
use App\Actions\GeoData\GetStatesFromIbgeAPI;
use App\Enums\GeoDataProvider;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StatesResource;
use App\Http\Traits\WithPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class GeoDataController extends Controller
{
    use WithPage;

    public function index(string $code): JsonResponse
    {
        $data = Cache::has("geo_data_$code")
            ? Cache::get("geo_data_$code")
            : StatesResource::collection($this->getSelectedProviderData($code));

        if ($data && $data->count() === 0) {
            return response()->json([
                'message' => 'No data found for the provided code.',
            ], Response::HTTP_NOT_FOUND);
        }

        if (!Cache::has("geo_data_$code")) {
            Cache::add("geo_data_$code", $data, now()->addHours(4));
        }

        return response()->json([
            $this->paginate(
                items: $data->toArray(request()),
                total: $data->count(),
                page: request()->get('page', 1)
            ),
        ]);
    }

    private function getSelectedProviderData(string $code): array
    {
        if (config('services.geo_data.selected') === GeoDataProvider::BRASIL_API->value) {
            return GetStatesFromBrasilAPI::execute($code);
        }

        return GetStatesFromIbgeAPI::execute($code);
    }
}
