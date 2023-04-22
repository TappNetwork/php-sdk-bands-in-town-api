<?php

declare(strict_types=1);

namespace BandsInTownApi;

use BandsInTownApi\Authenticators\HeaderAuthenticator;
use BandsInTownApi\Exceptions\ApiTypeException;
use BandsInTownApi\Responses\BandsInTownResponse;
use BandsInTownApi\Resource\PublicApiResource;
use BandsInTownApi\Resource\SearchApiResource;
use Generator;
use Saloon\Contracts\PendingRequest;
use Saloon\Http\Connector;
use Saloon\Contracts\Request;

class BandsInTownApi extends Connector
{
    protected string $apiType;

    /**
     * Define the custom response
     *
     * @var string
     */
    protected ?string $response = BandsInTownResponse::class;

    public function __construct(
    ){
        //
    }

    /**
     * Resolve the base URL of the service.
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return match($this->apiType) {
            'search' => 'https://search.bandsintown.com',
            default => 'https://rest.bandsintown.com',
        };
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

    /**
     * Define default config
     *
     * @return string[]
     */
    protected function defaultConfig(): array
    {
        return [
            'timeout' => 120,
        ];
    }

    public function withHeaderAuth(string $apiKey): static
    {
        return $this->authenticate(new HeaderAuthenticator($apiKey));
    }

    public function api(string $apiType): PublicApiResource|SearchApiResource
    {
        $this->apiType = $apiType;

        return match($apiType) {
            'public' => new PublicApiResource($this),
            'search' => new SearchApiResource($this),
            default => throw new ApiTypeException(sprintf('The %s API type is invalid', $apiType)),
        };
    }
}
