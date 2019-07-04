<?php

namespace App\Http\Controllers\Source;

use App\source;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(source $source)
    {
        return ['source' => $source];
    }
}
