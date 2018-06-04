<?php

namespace App\Http\Controllers\Administration\Event;

use App\Event;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class EventSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Event::class;

    protected $queryAttributes = [
        'description', 'date',
    ];
}
