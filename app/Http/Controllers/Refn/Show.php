<?php

namespace App\Http\Controllers\Refn;

use App\Models\Refn;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Refn $refn)
    {
        return ['refn' => $refn];
    }
}
