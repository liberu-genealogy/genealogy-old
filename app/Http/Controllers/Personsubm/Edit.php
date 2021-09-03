<?php

namespace App\Http\Controllers\Personsubm;

use App\Forms\Builders\PersonSubmForm;
use App\Models\PersonSubm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(PersonSubm $personSubm, PersonSubmForm $form)
    {
        return ['form' => $form->edit($personSubm)];
    }
}
