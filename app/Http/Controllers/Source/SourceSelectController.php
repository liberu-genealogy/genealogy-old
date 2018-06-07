<?php

namespace App\Http\Controllers\Source;

use App\Source;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class SourceSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Source::class;

    protected $queryAttributes = [
        'name', 'description', 'date',
    ];
}
