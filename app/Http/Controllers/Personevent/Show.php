<?php

namespace App\Http\Controllers\Personevent;

use App\Models\PersonEvent;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(PersonEvent $personEvent)
    {
        return ['personEvent' => $personEvent];
    }
}
