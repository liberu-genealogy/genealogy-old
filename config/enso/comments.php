<?php

return [
    'editableTimeLimit' => 24 * 60 * 60,
    'commentables' => [
        'owner' => App\Owner::class,
        'individual' => App\Individual::class,
        'event' => App\Event::class,
        'family' => App\Family::class,
    ],
];
