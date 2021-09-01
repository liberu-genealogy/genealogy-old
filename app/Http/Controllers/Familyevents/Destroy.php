<?php

namespace App\Http\Controllers\Familyevents;

use App\Models\FamilyEvent;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(FamilyEvent $familyEvent)
    {
        $familyEvent->delete();

        return [
            'message' => __('The family event was successfully deleted'),
            'redirect' => 'familyevents.index',
        ];
    }
}
