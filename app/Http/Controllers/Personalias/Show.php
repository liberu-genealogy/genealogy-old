<?php

namespace App\Http\Controllers\Personalias;

use App\PersonAlia;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(PersonAlia $personAlia)
    {
        return ['personAlia' => $personAlia];
    }
}
