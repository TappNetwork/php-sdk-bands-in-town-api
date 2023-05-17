<?php

declare(strict_types=1);

use BandsInTownApi\BandsInTownApi;
use BandsInTownApi\Requests\PublicApi\GetUpcomingArtistEvents;
use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

test('can retrieve upcoming artist events', function () {
    $mockClient = mockClient();
    $bandsInTownApi = new BandsInTownApi;
    $bandsInTownApi->withQueryAuth('app_id', 'my-app-id');
    $bandsInTownApi->api('public');
    $bandsInTownApi->withMockClient($mockClient);

    $artistName = 'Christina Aguilera';

    $response = $bandsInTownApi->send(new GetUpcomingArtistEvents($artistName));

    $mockClient->assertSent(GetUpcomingArtistEvents::class);

    $mockClient->assertSent(function (Request $request, Response $response) {
        return $request instanceof GetUpcomingArtistEvents
            && $response->body() == "[{\"id\":\"104054519\",\"url\":\"https://www.bandsintown.com/e/104054519?app_id=58c406aaf44bbb601a1bc5a75d0a4ca6&came_from=267&utm_medium=api&utm_source=public_api&utm_campaign=event\",\"datetime\":\"2023-05-06T15:00:00\",\"title\":\"Lovers & Friends 2023\",\"description\":\"\",\"artist\":{\"id\":\"39\",\"name\":\"Christina Aguilera\",\"url\":\"https://www.bandsintown.com/a/39?came_from=267&app_id=58c406aaf44bbb601a1bc5a75d0a4ca6\",\"mbid\":\"b202beb7-99bd-47e7-8b72-195c8d72ebdd\",\"options\":{\"display_listen_unit\":false},\"tracking\":[],\"image_url\":\"https://photos.bandsintown.com/large/12754027.jpeg\",\"thumb_url\":\"https://photos.bandsintown.com/thumb/12754027.jpeg\",\"facebook_page_url\":\"http://www.facebook.com/5565627823\",\"tracker_count\":2024835,\"upcoming_event_count\":1,\"support_url\":\"\",\"links\":[{\"type\":\"facebook\",\"url\":\"https://www.facebook.com/christinaaguilera/\"},{\"type\":\"tiktok\",\"url\":\"https://www.tiktok.com/@xtina\"},{\"type\":\"linktree\",\"url\":\"https://linktr.ee/xtinauniverse\"},{\"type\":\"website\",\"url\":\"https://www.christinaaguilera.com/\"},{\"type\":\"youtube\",\"url\":\"https://www.youtube.com/christinaaguilera\"},{\"type\":\"twitter\",\"url\":\"https://twitter.com/XTINA\"},{\"type\":\"instagram\",\"url\":\"https://www.instagram.com/xtina/\"},{\"type\":\"spotify\",\"url\":\"https://open.spotify.com/artist/1l7ZsJRRS8wlW3WfJfPfNS\"},{\"type\":\"itunes\",\"url\":\"https://music.apple.com/artist/christina-aguilera/259398\"},{\"type\":\"soundcloud\",\"url\":\"https://soundcloud.com/christinaaguilera\"}],\"artist_optin_show_phone_number\":false,\"show_multi_ticket\":true},\"venue\":{\"location\":\"Las Vegas, NV\",\"name\":\"Lovers & Friends 2023\",\"latitude\":\"36.1431237\",\"longitude\":\"-115.1621698\",\"street_address\":\"311 W Sahara Ave\",\"postal_code\":\"89101\",\"city\":\"Las Vegas\",\"country\":\"United States\",\"region\":\"NV\"},\"lineup\":[\"Christina Aguilera\"],\"offers\":[{\"type\":\"Tickets\",\"url\":\"https://www.bandsintown.com/t/104054519?app_id=58c406aaf44bbb601a1bc5a75d0a4ca6&came_from=267&utm_medium=api&utm_source=public_api&utm_campaign=ticket\",\"status\":\"available\"}],\"artist_id\":\"39\",\"on_sale_datetime\":\"\",\"festival_start_date\":\"2023-05-06\",\"festival_end_date\":\"2023-05-06\",\"festival_datetime_display_rule\":\"date\",\"starts_at\":\"2023-05-06T15:00:00\",\"ends_at\":\"2023-05-06T23:30:00\",\"datetime_display_rule\":\"datetime\",\"bandsintown_plus\":false}]";
    });

    expect($response)->toBeInstanceOf(BandsInTownResponse::class);
});
