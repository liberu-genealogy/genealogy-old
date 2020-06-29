<?php

namespace App\Http\Controllers\Personsubm;

use App\PersonSubm;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonSubmForm;

class Edit extends Controller
{
    public function __invoke(PersonSubm $personSubm, PersonSubmForm $form)
    {
        return ['form' => $form->edit($personSubm)];
    }
}
