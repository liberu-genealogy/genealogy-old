<?php

namespace App\Http\Controllers\Places;

use App\Forms\Builders\PlaceForm;
use App\Models\Place;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Place $place, PlaceForm $form)
    {
        return ['form' => $form->edit($place)];
    }
}
