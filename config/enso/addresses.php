<?php

return [
    'addressables' => [
        'owner' => App\Owner::class,
        'family' => App\Family::class,
        'individual' => App\Individual::class,
        'event' => App\Event::class,
    ],
    'streetTypes' => [
        'Street' => 'Street',
        'Avenue' => 'Avenue',
        'Boulevard' => 'Boulevard',
        'Parade' => 'Parade',
        'Road' => 'Road',
        'Lane' => 'Lane',
        'Route' => 'Route',
        'Row' => 'Row',
        'Vista' => 'Vista',
        'Bend' => 'Bend',
        'Square' => 'Square',
    ],
    'validations' => [
        'street' => 'required',
        'city' => 'required',
        'country_id' => 'required',
    ],
];
