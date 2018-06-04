<?php

namespace App\Http\Controllers\Individual;

use App\Individual;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class IndividualSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Individual::class;

    protected $queryAttributes = [
        'first_name', 'last_name', 'is_active',
    ];
}
