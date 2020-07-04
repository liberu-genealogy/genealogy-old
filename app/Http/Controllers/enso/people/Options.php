<?php

namespace App\Http\Controllers\enso\people;

use App\Person;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Person::class;

    protected $queryAttributes = ['name', 'appellative', 'uid', 'phone'];
}
