<?php

use LaravelEnso\Companies\app\Models\Company;
use App\Individual;

return [
    'deletableTimeLimit' => 60 * 60,
    'linkExpiration' => 60 * 60 * 24,
    'imageWidth' => 2048,
    'imageHeight' => 2048,
    'onDelete' => 'restrict',
    'loggableMorph' => [
        'documentable' => [Company::class => 'name', Individual::class => 'name'],
    ],
];
