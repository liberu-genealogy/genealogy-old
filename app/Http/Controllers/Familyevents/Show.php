<?php

namespace App\Http\Controllers\Familyevents;

use App\Models\FamilyEvent;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(FamilyEvent $familyEvent)
    {
        return ['familyEvent' => $familyEvent];
    }
}
