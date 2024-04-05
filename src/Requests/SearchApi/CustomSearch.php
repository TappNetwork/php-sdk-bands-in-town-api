<?php

declare(strict_types=1);

namespace BandsInTownApi\Requests\SearchApi;

use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class CustomSearch extends Request
{
    /**
     * HTTP Method
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected array $data,
    ) {
    }

    protected function defaultQuery(): array
    {
        return [
            'query' => json_encode($this->data),
        ];
    }

    /**
     * Search API
     *
     * @see https://artists.bandsintown.com/support/partner-search-api Search API Doc
     */
    public function resolveEndpoint(): string
    {
        return '/search';
    }

    public function resolveResponseClass(): string
    {
        return BandsInTownResponse::class;
    }
}
