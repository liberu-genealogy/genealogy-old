<?php

use App\Individual;

return [
    'event' => [
        'individual' => App\Individual::class,
        'family' => App\Family::class,
    ],
    'loggableMorph' => [
        'documentable' => [Individual::class => 'name'],
    ],
];
