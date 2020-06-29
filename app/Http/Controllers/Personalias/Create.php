<?php

namespace App\Http\Controllers\Personalias;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonAliaForm;

class Create extends Controller
{
    public function __invoke(PersonAliaForm $form)
    {
        return ['form' => $form->create()];
    }
}
