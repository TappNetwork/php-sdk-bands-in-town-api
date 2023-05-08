# PHP SDK for Bands In Town API

Provides a PHP wrapper for Bands In Town [public](https://artists.bandsintown.com/support/public-api) and [search](https://artists.bandsintown.com/support/partner-search-api/) APIs.

## Installation

Installing via Composer:

```bash
composer require andreia/php-sdk-bands-in-town-api
```

## Usage

### Instantiate the API class

```php
use BandsInTownApi\BandsInTownApi;

$bandsInTownApi = new BandsInTownApi;
```

### Public API

Public API documentation:  
https://artists.bandsintown.com/support/public-api

```php
$bandsInTownApi->api('public')
```

### Authentication

```php
$bandsInTownApi->withQueryAuth('app_id', 'your-app-id');
```

#### Artist Info By Name

```php
$bandsInTownApi->api('public')->artistInfoByName('artist name');
```

E.g.:
```php
$artistInfoByName = $bandsInTownApi->api('public')->artistInfoByName('Justin Bieber');
$artistInfoByName->body();
// "{"id": "307871", "name": "Justin Bieber", "url": "https://www.bandsintown.com/a/307871?came_from=267&app_id=58c406aaf44bbb601a1bc5a75d0a4ca6", "mbid": "e0140a67-e4d1-4f13-8a01-364355bee46e", "options": {"display_listen_unit": false}, "tracking": [], "image_url": "https://photos.bandsintown.com/large/11112851.jpeg", "thumb_url": "https://photos.bandsintown.com/thumb/11112851.jpeg", "facebook_page_url": "http://www.facebook.com/67253243887", "tracker_count": 5295141, "upcoming_event_count": 0, "support_url": "", "links": [{"type": "itunes", "url": "https://itunes.apple.com/us/artist/justin-bieber/320569549"}, {"type": "youtube", "url": "https://www.youtube.com/user/kidrauhl"}, {"type": "amazon", "url": "https://music.amazon.com/artists/B002F0BWIM"}, {"type": "spotify", "url": "https://open.spotify.com/artist/1uNFoZAHBGtllmzznpCI3s"}, {"type": "snapchat", "url": "https://www.snapchat.com/add/rickthesizzler"}, {"type": "store/merch", "url": "https://shop.justinbiebermusic.com"}, {"type": "tumblr", "url": "https://justinbieber.tumblr.com"}, {"type": "newsletter", "url": "https://www.justinbiebermusic.com"}, {"type": "soundcloud", "url": "https://soundcloud.com/justinbieber"}, {"type": "facebook", "url": "https://www.facebook.com/JustinBieber/"}, {"type": "iheart", "url": "https://www.iheart.com/artist/justin-bieber-44368/"}, {"type": "instagram", "url": "https://www.instagram.com/justinbieber/"}, {"type": "website", "url": "https://www.justinbiebermusic.com/"}, {"type": "vevo", "url": "https://www.youtube.com/user/JustinBieberVEVO"}, {"type": "twitter", "url": "https://twitter.com/justinbieber"}], "artist_optin_show_phone_number": false, "show_multi_ticket": true}"
```

#### Artist Info By Id

```php
$bandsInTownApi->api('public')->artistInfoById('artist id');
```

E.g.:
```php
$artistInfoById = $bandsInTownApi->api('public')->artistInfoById('307871');
```

#### Artist Info By Facebook Page Id

```php
$bandsInTownApi->api('public')->artistInfoByFacebookPageId('facebook page id');
```

E.g.:
```php
$artistInfoById = $bandsInTownApi->api('public')->artistInfoByFacebookPageId('67253243887');
```

#### Artist Upcoming Events

```php
$bandsInTownApi->api('public')->artistUpcomingEvents('artist name');
```

E.g.:
```php
$artistUpcomingEvents = $bandsInTownApi->api('public')->artistUpcomingEvents('Christina Aguilera');;

$artistUpcomingEvents->body();
// [{"id":"104054519","url":"https:\/\/www.bandsintown.com\/e\/104054519?app_id=58c406aaf44bbb601a1bc5a75d0a4ca6&came_from=267&utm_medium=api&utm_source=public_api&utm_campaign=event","datetime":"2023-05-06T15:00:00","title":"Lovers & Friends 2023","description":"","artist":{"id":"39","name":"Christina Aguilera","url":"https:\/\/www.bandsintown.com\/a\/39?came_from=267&app_id=58c406aaf44bbb601a1bc5a75d0a4ca6","mbid":"b202beb7-99bd-47e7-8b72-195c8d72ebdd","options":{"display_listen_unit":false},"tracking":[],"image_url":"https:\/\/photos.bandsintown.com\/large\/12754027.jpeg","thumb_url":"https:\/\/photos.bandsintown.com\/thumb\/12754027.jpeg","facebook_page_url":"http:\/\/www.facebook.com\/5565627823","tracker_count":2024835,"upcoming_event_count":1,"support_url":"","links":[{"type":"facebook","url":"https:\/\/www.facebook.com\/christinaaguilera\/"},{"type":"tiktok","url":"https:\/\/www.tiktok.com\/@xtina"},{"type":"linktree","url":"https:\/\/linktr.ee\/xtinauniverse"},{"type":"website","url":"https:\/\/www.christinaaguilera.com\/"},{"type":"youtube","url":"https:\/\/www.youtube.com\/christinaaguilera"},{"type":"twitter","url":"https:\/\/twitter.com\/XTINA"},{"type":"instagram","url":"https:\/\/www.instagram.com\/xtina\/"},{"type":"spotify","url":"https:\/\/open.spotify.com\/artist\/1l7ZsJRRS8wlW3WfJfPfNS"},{"type":"itunes","url":"https:\/\/music.apple.com\/artist\/christina-aguilera\/259398"},{"type":"soundcloud","url":"https:\/\/soundcloud.com\/christinaaguilera"}],"artist_optin_show_phone_number":false,"show_multi_ticket":true},"venue":{"location":"Las Vegas, NV","name":"Lovers & Friends 2023","latitude":"36.1431237","longitude":"-115.1621698","street_address":"311 W Sahara Ave","postal_code":"89101","city":"Las Vegas","country":"United States","region":"NV"},"lineup":["Christina Aguilera"],"offers":[{"type":"Tickets","url":"https:\/\/www.bandsintown.com\/t\/104054519?app_id=58c406aaf44bbb601a1bc5a75d0a4ca6&came_from=267&utm_medium=api&utm_source=public_api&utm_campaign=ticket","status":"available"}],"artist_id":"39","on_sale_datetime":"","festival_start_date":"2023-05-06","festival_end_date":"2023-05-06","festival_datetime_display_rule":"date","starts_at":"2023-05-06T15:00:00","ends_at":"2023-05-06T23:30:00","datetime_display_rule":"datetime","bandsintown_plus":false}]
$artistUpcomingEvents->status(); 
// 200
```

#### Artist Events By Date Range

```php
$bandsInTownApi->api('public')->artistEventsByDateRange('artist name');
```

E.g.:
```php
$artistEventsByDateRange = $bandsInTownApi->api('public')->artistEventsByDateRange('Christina Aguilera', '2023-05-01,2023-06-01');
```

#### Artist Past Events

```php
$bandsInTownApi->api('public')->artistPastEvents('artist name');
```

E.g.:
```php
$artistPastEvents = $bandsInTownApi->api('public')->artistPastEvents('Christina Aguilera');
```

#### All Artist Events

```php
$bandsInTownApi->api('public')->artistAllEvents('artist name');
```

E.g.:
```php
$allArtistEvents = $bandsInTownApi->api('public')->artistAllEvents('Christina Aguilera');
```

### Search API

Search API documentation: 
https://artists.bandsintown.com/support/partner-search-api/

```php
$bandsInTownApi->api('search')
```

### Authentication
```php
$bandsInTownApi->withHeaderAuth('your-api-key');
```

### Available methods

Array of entities to search
```php
->entities([
    [
        'type' => 'artist',
        'order' => 'trackers',
        'limit' => 2,
        'offset' => 0,
    ],
])
```

Term to search
```php
->term('Bell')
```

Type to search. Possible values: 'streaming', 'physical', 'both' (default)
```php
->type('streaming')
```

Genre to search. Possible values: see https://artists.bandsintown.com/support/partner-search-api/#query_string_parameters
```php
->genre('pop')
```

Genres to search. Possible values: see https://artists.bandsintown.com/support/partner-search-api/#query_string_parameters
```php
->genres([
    'pop', 
    'jazz'
])
```

Restrict search to the provided scopes of entity for a given term. Possible values: 'artist', 'event', 'venue', 'event_id'
```php
->scopes([
    'artist',
])
```

Limit search to a provided region. Not applicable for artist
```php
->region([
    'latitude' => 45.496112,
    'longitude' => -73.569315,
])
```

Limit search to a range of dates. Only for event search
```php
->period([
    'starts_at' => '2021-08-20T00:00:00Z',
    'ends_at' => '2021-08-23T00:00:00Z',
])
```

Filter search. Possible values: 'on tour' (for artist search), "recommended", "tracked artist" (when user object is provided)
```php
->filter('on tour')
```

Send the request
```php
->send()
```

Examples:

#### Single entity with pagination (search by artist with pagination)

```php
$artist = $bandsInTownApi->api('search')
    ->entities([
        'type' => 'artist',
        'order' => 'trackers',
        'limit' => 2,
        'offset' => 0,
    ])
    ->term('Lady')
    ->scopes([
        'artist'
    ])
    ->send();
```

#### Retrieve multiple entities (search by artist and events with pagination)

```php
$artistAndEvent = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'artist',
            'order' => 'trackers',
            'limit' => 2,
            'offset' => 0,
        ],
        [
            'type' => 'event',
            'order' => 'rsvps',
            'limit' => 4,
        ]
    ])
    ->term('Lady')
    ->scopes([
        'artist',
        'event',
    ])
    ->send();
```

####  Retrieve a specific event

```php
$event = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
        ]
    ])
    ->term('102617588')
    ->scopes([
        'event_id',
    ])
    ->send();
```

####  Search events by artist id

```php
$event = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
            'order' => 'rsvps',
            'limit' => 4,
        ],
    ])
    ->term('22741')
    ->scopes([
        'artist_id',
    ])
    ->send();
```


####  Search venues by name or by id

```php
// search by venue name
$venue = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'venue',
        ],
    ])
    ->term('Bell Centre')
    ->scopes([
        'venue',
    ])
    ->send();
```

```php
// search by venue id
$venue = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'venue',
        ],
    ])
    ->term('10003087')
    ->scopes([
        'venue_id',
    ])
    ->send();
```

#### Search events by venue id

```php
$events = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
        ],
    ])
    ->term('10003087')
    ->scopes([
        'venue_id'
    ])
    ->send();
```

#### Search events and artists who played in a specific venue by venue id and genre

```php
$events = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
        ],
    ])
    ->term('10003087')
    ->genre('pop')
    ->send();
```

#### Search events by GPS coordinates and genre

```php
$events = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
        ],
    ])
    ->region([
        'latitude' => 45.496112,
        'longitude' => -73.569315,
    ])
    ->genre('pop')
    ->send();
```

#### Search live streaming events

```php
$events = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
        ],
    ])
    ->term('jason wild')
    ->type('streaming')
    ->send();
```

#### Search live streaming events by genre

```php
$events = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
        ],
    ])
    ->genre('latin')
    ->type('streaming')
    ->send();
```

#### Search physical events, last modified in a period of time, ordered by start date

```php
$events = $bandsInTownApi->api('search')
    ->entities([
        [
            'type' => 'event',
            'order' => 'start_date',
            'limit' => 199,
            'offset' => 0,
        ],
    ])
    ->term('2021-08-20T00:00:00ZTO2021-08-23T00:00:00Z')
    ->scopes(['last_modified_date'])
    ->type('physical')
    ->send();
```

## Testing

```bash
./vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Contributions are welcome! :)

## License

The MIT License (MIT). Read [License](LICENSE) for more information.
