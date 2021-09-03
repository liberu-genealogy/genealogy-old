<?php

namespace App\Http\Controllers\Citations;

use App\Models\Citation;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Citation $citation)
    {
        return ['citation' => $citation];
    }
}
