<?php

namespace App\Http\Controllers\Places;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PlaceForm;

class Create extends Controller
{
    public function __invoke(PlaceForm $form)
    {
        return ['form' => $form->create()];
    }
}
