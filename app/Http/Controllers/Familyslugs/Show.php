<?php

namespace App\Http\Controllers\Familyslugs;

use App\FamilySlgs;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(FamilySlgs $familySlgs)
    {
        return ['familySlgs' => $familySlgs];
    }
}
