<?php

namespace App\Http\Controllers\Families;

use App\Models\Family;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke($family)
    {
        $family = Family::find($family);

        return ['family' => $family];
    }
}
