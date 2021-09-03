<?php

namespace App\Http\Controllers\Personsubm;

use App\Models\PersonSubm;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(PersonSubm $personSubm)
    {
        return ['personSubm' => $personSubm];
    }
}
