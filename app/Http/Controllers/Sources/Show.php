<?php

namespace App\Http\Controllers\Sources;

use App\Source;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Source $source)
    {
        return ['source' => $source];
    }
}
