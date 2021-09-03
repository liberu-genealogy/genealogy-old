<?php

namespace App\Http\Controllers\Personalias;

use App\Forms\Builders\PersonAliaForm;
use App\Models\PersonAlia;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(PersonAlia $personAlia, PersonAliaForm $form)
    {
        return ['form' => $form->edit($personAlia)];
    }
}
