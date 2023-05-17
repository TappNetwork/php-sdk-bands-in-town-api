<?php

declare(strict_types=1);

use BandsInTownApi\BandsInTownApi;
use BandsInTownApi\Requests\SearchApi\CustomSearch;
use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

test('can search physical events by GPS coordinates and genre', function (array $entities, array $region, string $genre, string $type) {
    $mockClient = mockClient();
    $bandsInTownApi = new BandsInTownApi;
    $bandsInTownApi->withHeaderAuth('my-api-key');
    $bandsInTownApi->withMockClient($mockClient);

    $response = $bandsInTownApi
        ->api('search')
        ->entities($entities)
        ->region($region)
        ->genre($genre)
        ->type($type)
        ->send();

    $mockClient->assertSent(function (Request $request, Response $response) {
        return $request instanceof CustomSearch;
    });

    expect($response)->toBeInstanceOf(BandsInTownResponse::class);
    expect($response->status())->toBe(200);
})->with('search');
