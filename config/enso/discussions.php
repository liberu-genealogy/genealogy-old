<?php

use LaravelEnso\Companies\app\Models\Company;
use App\Individual;

return [
    'onDelete' => 'cascade',
    'loggableMorph' => [
        'discussable' =>
            [Company::class => 'name', Individual::class => 'name'],
    ],
];
