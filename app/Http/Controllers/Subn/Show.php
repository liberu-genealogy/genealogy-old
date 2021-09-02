<?php

namespace App\Http\Controllers\Subn;

use App\Models\Subn;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Subn $subn)
    {
        return ['subn' => $subn];
    }
}
