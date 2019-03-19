<?php

namespace App\Http\Controllers\Events;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class EventSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Event::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Event::query();
    //}
}
