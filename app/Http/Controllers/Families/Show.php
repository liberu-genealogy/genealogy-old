<?php

namespace App\Http\Controllers\Families;

use App\Family;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Family $family)
    {
        return ['family' => $family];
    }
}
