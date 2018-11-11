<?php

use LaravelEnso\Companies\app\Models\Company;
use App\Individual;

return [
    'editableTimeLimit' => 24 * 60 * 60,
    'onDelete' => 'cascade',
    'loggableMorph' => [
        'commentable' =>
            [Company::class => 'name', Individual::class => 'name'],
    ],
];
