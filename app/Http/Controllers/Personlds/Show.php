<?php

namespace App\Http\Controllers\Personlds;

use App\Models\PersonLds;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(PersonLds $personLds)
    {
        return ['personLds' => $personLds];
    }
}
