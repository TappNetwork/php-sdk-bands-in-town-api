<?php

declare(strict_types=1);

use BandsInTownApi\BandsInTownApi;
use BandsInTownApi\Requests\PublicApi\GetArtistInfoByName;
use BandsInTownApi\Responses\BandsInTownResponse;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

test('can retrieve artist info by name', function () {
    $mockClient = mockClient();
    $bandsInTownApi = new BandsInTownApi;
    $bandsInTownApi->withQueryAuth('app_id', 'my-app-id');
    $bandsInTownApi->api('public');
    $bandsInTownApi->withMockClient($mockClient);

    $artistName = 'Justin Bieber';

    $response = $bandsInTownApi->send(new GetArtistInfoByName($artistName));

    $mockClient->assertSent(GetArtistInfoByName::class);

    $mockClient->assertSent(function (Request $request, Response $response) {
        return $request instanceof GetArtistInfoByName
            && $response->body() == "{\"id\": \"307871\", \"name\": \"Justin Bieber\", \"url\": \"https://www.bandsintown.com/a/307871?came_from=267&app_id=58c406aaf44bbb601a1bc5a75d0a4ca6\", \"mbid\": \"e0140a67-e4d1-4f13-8a01-364355bee46e\", \"options\": {\"display_listen_unit\": false}, \"tracking\": [], \"image_url\": \"https://photos.bandsintown.com/large/11112851.jpeg\", \"thumb_url\": \"https://photos.bandsintown.com/thumb/11112851.jpeg\", \"facebook_page_url\": \"http://www.facebook.com/67253243887\", \"tracker_count\": 5295141, \"upcoming_event_count\": 0, \"support_url\": \"\", \"links\": [{\"type\": \"itunes\", \"url\": \"https://itunes.apple.com/us/artist/justin-bieber/320569549\"}, {\"type\": \"youtube\", \"url\": \"https://www.youtube.com/user/kidrauhl\"}, {\"type\": \"amazon\", \"url\": \"https://music.amazon.com/artists/B002F0BWIM\"}, {\"type\": \"spotify\", \"url\": \"https://open.spotify.com/artist/1uNFoZAHBGtllmzznpCI3s\"}, {\"type\": \"snapchat\", \"url\": \"https://www.snapchat.com/add/rickthesizzler\"}, {\"type\": \"store/merch\", \"url\": \"https://shop.justinbiebermusic.com\"}, {\"type\": \"tumblr\", \"url\": \"https://justinbieber.tumblr.com\"}, {\"type\": \"newsletter\", \"url\": \"https://www.justinbiebermusic.com\"}, {\"type\": \"soundcloud\", \"url\": \"https://soundcloud.com/justinbieber\"}, {\"type\": \"facebook\", \"url\": \"https://www.facebook.com/JustinBieber/\"}, {\"type\": \"iheart\", \"url\": \"https://www.iheart.com/artist/justin-bieber-44368/\"}, {\"type\": \"instagram\", \"url\": \"https://www.instagram.com/justinbieber/\"}, {\"type\": \"website\", \"url\": \"https://www.justinbiebermusic.com/\"}, {\"type\": \"vevo\", \"url\": \"https://www.youtube.com/user/JustinBieberVEVO\"}, {\"type\": \"twitter\", \"url\": \"https://twitter.com/justinbieber\"}], \"artist_optin_show_phone_number\": false, \"show_multi_ticket\": true}";
    });

    expect($response)->toBeInstanceOf(BandsInTownResponse::class);
});
