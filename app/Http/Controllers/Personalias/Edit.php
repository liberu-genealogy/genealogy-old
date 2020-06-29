<?php

namespace App\Http\Controllers\Personalias;

use App\PersonAlia;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonAliaForm;

class Edit extends Controller
{
    public function __invoke(PersonAlia $personAlia, PersonAliaForm $form)
    {
        return ['form' => $form->edit($personAlia)];
    }
}
