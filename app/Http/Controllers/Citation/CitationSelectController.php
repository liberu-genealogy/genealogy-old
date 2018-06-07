<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class CitationSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Citation::class;

    protected $queryAttributes = [
        'name', 'description', 'date',
    ];
}
