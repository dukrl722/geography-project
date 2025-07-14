<?php

declare(strict_types = 1);

namespace App\Services\BrasilAPI\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Cities
{
    protected string $url = 'ibge/municipios/v1';

    protected Response $response;

    protected PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::baseUrl(config('services.geo_data.brasil_api.base_url'));
    }

    public function search(string $code): static
    {
        $this->response = $this->api->get("$this->url/$code");

        return $this;
    }

    public function json(): ?array
    {
        return $this->response->json();
    }

    public function collection(): Collection
    {
        return $this->response->collect();
    }

    public function response(): Response
    {
        return $this->response;
    }
}
