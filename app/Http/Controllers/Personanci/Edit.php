<?php

namespace App\Http\Controllers\Personanci;

use App\Forms\Builders\PersonAnciForm;
use App\PersonAnci;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(PersonAnci $personAnci, PersonAnciForm $form)
    {
        return ['form' => $form->edit($personAnci)];
    }
}
