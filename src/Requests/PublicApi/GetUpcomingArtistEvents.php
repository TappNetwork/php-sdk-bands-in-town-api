<?php

declare(strict_types=1);

namespace BandsInTownApi\Requests\PublicApi;

use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUpcomingArtistEvents extends Request
{
    /**
     * HTTP Method
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected string $artistName,
    ) {
    }

    /**
     * Get Upcoming Artist Events By Artist Name
     *
     * @see https://artists.bandsintown.com/support/public-api
     */
    public function resolveEndpoint(): string
    {
        return "/artists/{$this->artistName}/events";
    }

    public function resolveResponseClass(): string
    {
        return BandsInTownResponse::class;
    }
}
