<?php

namespace App\Http\Controllers\Subm;

use App\Models\Subm;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Subm $subm)
    {
        return ['subm' => $subm];
    }
}
