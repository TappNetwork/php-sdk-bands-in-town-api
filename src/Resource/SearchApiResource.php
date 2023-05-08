<?php

namespace BandsInTownApi\Resource;

use BandsInTownApi\Exceptions\ValidationFailedException;
use BandsInTownApi\Requests\SearchApi\CustomSearch;
use Illuminate\Support\Arr;

class SearchApiResource extends Resource
{
    public array $entities = [];

    public ?string $term = null;

    public ?string $type = null;

    public ?string $filter = null;

    public ?string $genre = null;

    public ?array $genres = null;

    public ?array $scopes = null;

    public ?array $region = null;

    public ?array $user = null;

    public ?array $period = null;

    public ?string $tag = null;

    public function entities(array $entities)
    {
        $this->entities = $entities;

        return $this;
    }

    public function term(string $term)
    {
        $this->term = $term;

        return $this;
    }

    public function type(string $type)
    {
        $this->type = $type;

        return $this;
    }

    public function filter(string $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    public function genre(string $genre)
    {
        $this->genre = $genre;

        return $this;
    }

    public function genres(array $genres)
    {
        $this->genres = $genres;

        return $this;
    }

    public function scopes(array $scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }

    public function region(array $region)
    {
        $this->region = $region;

        return $this;
    }

    public function user(array $user)
    {
        $this->user = $user;

        return $this;
    }

    public function period(array $period)
    {
        $this->period = $period;

        return $this;
    }

    public function tag(string $tag)
    {
        $this->tag = $tag;

        return $this;
    }

    public function send()
    {
        $query = $this->getQuery();

        return $this->connector->send(new CustomSearch($query));
    }

    private function getQuery()
    {
        if (count($this->entities) === 0) {
            throw new ValidationFailedException('The entities query parameter couldn\'t be empty.');
        }

        $query = [
            'entities' => $this->entities,
        ];

        if ($this->term !== null) {
            $query = Arr::add($query, 'term', $this->term);
        }

        if ($this->type !== null) {
            $query = Arr::add($query, 'type', $this->type);
        }

        if ($this->filter !== null) {
            $query = Arr::add($query, 'filter', $this->filter);
        }

        if ($this->genre !== null) {
            $query = Arr::add($query, 'genre', $this->genre);
        }

        if ($this->genres !== null) {
            $query = Arr::add($query, 'genres', $this->genres);
        }

        if ($this->scopes !== null) {
            $query = Arr::add($query, 'scopes', $this->scopes);
        }

        if ($this->region !== null) {
            $query = Arr::add($query, 'region', $this->region);
        }

        if ($this->user !== null) {
            $query = Arr::add($query, 'user', $this->user);
        }

        if ($this->period !== null) {
            $query = Arr::add($query, 'period', $this->period);
        }

        if ($this->tag !== null) {
            $query = Arr::add($query, 'tag', $this->tag);
        }

        return $query;
    }
}
