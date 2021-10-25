<?php

namespace App\Http\Controllers\DnaMatching;

use App\Models\DnaMatching;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(DnaMatching $dnamatching)
    {
        return ['dnamatching' => $dnamatching];
    }
}
