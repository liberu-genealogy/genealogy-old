<?php

namespace App\Http\Controllers\Personanci;

use App\PersonAnci;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonAnciForm;

class Edit extends Controller
{
    public function __invoke(PersonAnci $personAnci, PersonAnciForm $form)
    {
        return ['form' => $form->edit($personAnci)];
    }
}
