<?php

declare(strict_types=1);

namespace BandsInTownApi;

use BandsInTownApi\Exceptions\ApiTypeException;
use BandsInTownApi\Resource\PublicApiResource;
use BandsInTownApi\Resource\SearchApiResource;
use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;

class BandsInTownApi extends Connector
{
    protected string $apiType;

    protected ?string $response = BandsInTownResponse::class;

    public function __construct()
    {
        //
    }

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return match ($this->apiType) {
            'search' => 'https://search.bandsintown.com',
            default => 'https://rest.bandsintown.com',
        };
    }

    public function resolveResponseClass(): string
    {
        return BandsInTownResponse::class;
    }

    /**
     * Define default headers
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultConfig(): array
    {
        return [
            'timeout' => 120,
        ];
    }

    public function withHeaderAuth(string $apiKey, string $headerName = 'x-api-key'): static
    {
        return $this->authenticate(new HeaderAuthenticator($apiKey, $headerName));
    }

    public function api(string $apiType): PublicApiResource|SearchApiResource
    {
        $this->apiType = $apiType;

        return match ($apiType) {
            'public' => new PublicApiResource($this),
            'search' => new SearchApiResource($this),
            default => throw new ApiTypeException(sprintf('The %s API type is invalid', $apiType)),
        };
    }
}
