<?php

namespace App\Http\Controllers\Subm;

use App\Subm;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Subm $subm)
    {
        return ['subm' => $subm];
    }
}
