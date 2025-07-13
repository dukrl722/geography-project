<?php

declare(strict_types = 1);

use App\Enums\GeoDataProvider;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->brasilApiUrl = config('services.geo_data.brasil_api.base_url') . '/ibge/municipios/v1/pr';
    $this->ibgeApiUrl   = config('services.geo_data.ibge.base_url') . '/localidades/estados/pr/municipios';
});

it('should return a list of states when brasil api is set as provider', function (): void {
    Http::fake([
        $this->brasilApiUrl => Http::response([
            [
                'nome' => 'name 1',
                'codigo_ibge' => 1234567,
            ],
            [
                'nome' => 'name 2',
                'codigo_ibge' => 1234568,
            ],
        ])
    ]);

    config(['services.geo_data.selected' => 'brasil_api']);

    expect(config('services.geo_data.selected'))->toBe(GeoDataProvider::BRASIL_API->value);

    $this->getJson(route('v1.state.cities.index', ['code' => 'pr']))
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'ibge_code',
                ],
            ],
        ]);
});

it('should return a list of states when ibge api is set as provider', function (): void {
    Http::fake([
        $this->ibgeApiUrl => Http::response([
            [
                'nome' => 'name 1',
                'id'   => 1234567,
                'microrregiao' => [
                    'id' => 12345,
                    'nome' => 'Microregion Name',
                    'UF' => [
                        'id' => 12,
                        'sigla' => 'PR',
                        'nome' => 'Paraná',
                        'regiao' => [
                            'id' => 1,
                            'nome' => 'Região Sul',
                            'sigla' => 'SUL',
                        ],
                    ]
                ],
            ],
        ])
    ]);

    expect(config('services.geo_data.selected'))->toBe(GeoDataProvider::IBGE->value);

    $this->getJson(route('v1.state.cities.index', ['code' => 'pr']))
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'ibge_code',
                ],
            ],
        ]);
});

it('should return a message when provided code is incorrect', function (): void {
    Http::fake([
        $this->ibgeApiUrl => Http::response([], Response::HTTP_NOT_FOUND),
    ]);

    $this->getJson(route('v1.state.cities.index', ['code' => 'A']))
        ->assertNotFound()
        ->assertJson([
            'message' => 'No data found for the provided code.',
        ]);
});
