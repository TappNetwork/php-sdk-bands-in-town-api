<?php

dataset('search', function (): iterable {
    yield 'query physical events' => [
        'entities' => [
            'type' => 'event',
        ],
        'region' => [
            'latitude' => 45.496112,
            'longitude' => -73.569315,
            'radius' => 50,
        ],
        'genre' => 'pop',
        'type' => 'physical',
    ];
});
