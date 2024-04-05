<?php

declare(strict_types=1);

namespace BandsInTownApi\Requests\PublicApi;

use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetArtistInfoById extends Request
{
    /**
     * HTTP Method
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected string $artistId,
    ) {
    }

    /**
     * Get Artist Info By Id
     *
     * Returns the link to the Bandsintown artist page, the link to the artist photo,
     * the current number of trackers, and more.
     *
     * @see https://artists.bandsintown.com/support/public-api
     */
    public function resolveEndpoint(): string
    {
        return "/artists/id_{$this->artistId}";
    }

    public function resolveResponseClass(): string
    {
        return BandsInTownResponse::class;
    }
}
