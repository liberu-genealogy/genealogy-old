<?php

namespace App\Http\Controllers\Personevent;

use App\Models\PersonEvent;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(PersonEvent $personEvent)
    {
        $personEvent->delete();

        return [
            'message' => __('The person event was successfully deleted'),
            'redirect' => 'personevent.index',
        ];
    }
}
