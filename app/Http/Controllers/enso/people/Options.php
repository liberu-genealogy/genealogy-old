<?php

namespace App\Http\Controllers\enso\people;

use Illuminate\Routing\Controller;
use App\Person;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Person::class;

    protected $queryAttributes = ['name', 'appellative', 'uid', 'phone'];
}
