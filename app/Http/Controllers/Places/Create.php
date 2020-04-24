<?php

namespace App\Http\Controllers\Places;

use App\Forms\Builders\PlaceForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PlaceForm $form)
    {
        return ['form' => $form->create()];
    }
}
