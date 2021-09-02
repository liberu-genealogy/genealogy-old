<?php

namespace App\Http\Controllers\Places;

use App\Models\Place;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Place $place)
    {
        $place->delete();

        return [
            'message' => __('The place was successfully deleted'),
            'redirect' => 'places.index',
        ];
    }
}
