<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Citation $citation)
    {
        return ['citation' => $citation];
    }
}
