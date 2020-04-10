<?php

namespace App\Http\Controllers\Places;

use App\Place;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PlaceForm;

class Edit extends Controller
{
    public function __invoke(Place $place, PlaceForm $form)
    {
        return ['form' => $form->edit($place)];
    }
}
