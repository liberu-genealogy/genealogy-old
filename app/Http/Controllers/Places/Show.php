<?php

namespace App\Http\Controllers\Places;

use App\Models\Place;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Place $place)
    {
        return ['place' => $place];
    }
}
