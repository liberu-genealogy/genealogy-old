<?php

namespace App\Http\Controllers\Personalias;

use App\Forms\Builders\PersonAliaForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonAliaForm $form)
    {
        return ['form' => $form->create()];
    }
}
