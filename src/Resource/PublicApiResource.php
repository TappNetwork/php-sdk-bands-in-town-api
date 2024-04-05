<?php

namespace BandsInTownApi\Resource;

use BandsInTownApi\Requests\PublicApi\GetAllArtistEvents;
use BandsInTownApi\Requests\PublicApi\GetArtistEventsByDateRange;
use BandsInTownApi\Requests\PublicApi\GetArtistInfoByFacebookPageId;
use BandsInTownApi\Requests\PublicApi\GetArtistInfoById;
use BandsInTownApi\Requests\PublicApi\GetArtistInfoByName;
use BandsInTownApi\Requests\PublicApi\GetPastArtistEvents;
use BandsInTownApi\Requests\PublicApi\GetUpcomingArtistEvents;
use BandsInTownApi\Responses\BandsInTownResponse as Response;

class PublicApiResource extends Resource
{
    public function artistInfoByName(string $artistName): Response
    {
        return $this->connector->send(new GetArtistInfoByName($artistName));
    }

    public function artistInfoById(string $artistId): Response
    {
        return $this->connector->send(new GetArtistInfoById($artistId));
    }

    public function artistInfoByFacebookPageId(string $artistFacebookPageId): Response
    {
        return $this->connector->send(new GetArtistInfoByFacebookPageId($artistFacebookPageId));
    }

    public function artistUpcomingEvents(string $artistName): Response
    {
        return $this->connector->send(new GetUpcomingArtistEvents($artistName));
    }

    public function artistPastEvents(string $artistName): Response
    {
        return $this->connector->send(new GetPastArtistEvents($artistName));
    }

    public function artistAllEvents(string $artistName): Response
    {
        return $this->connector->send(new GetAllArtistEvents($artistName));
    }

    public function artistEventsByDateRange(string $artistName, string $dateRange): Response
    {
        return $this->connector->send(new GetArtistEventsByDateRange($artistName, $dateRange));
    }
}
