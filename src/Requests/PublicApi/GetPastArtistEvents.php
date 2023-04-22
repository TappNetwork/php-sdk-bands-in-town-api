<?php

declare(strict_types=1);

namespace BandsInTownApi\Requests\PublicApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPastArtistEvents extends Request
{
    /**
     * HTTP Method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected string $artistName,
    ){}

    protected function defaultQuery(): array
    {
        return [
            'date' => 'past',
        ];
    }

    /**
     * Get Past Artist Events By Artist Name
     *
     * @see https://artists.bandsintown.com/support/public-api
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/artists/{$this->artistName}/events";
    }
}
