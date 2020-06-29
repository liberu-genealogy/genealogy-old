<?php

namespace App\Http\Controllers\Personasso;

use App\PersonAsso;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonAssoForm;

class Edit extends Controller
{
    public function __invoke(PersonAsso $personAsso, PersonAssoForm $form)
    {
        return ['form' => $form->edit($personAsso)];
    }
}
