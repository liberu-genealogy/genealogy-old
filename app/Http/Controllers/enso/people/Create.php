<?php

namespace App\Http\Controllers\enso\people;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonForm;

class Create extends Controller
{
    public function __invoke(PersonForm $form)
    {
        return ['form' => $form->create()];
    }
}
