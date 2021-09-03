<?php

namespace App\Http\Controllers\Personasso;

use App\Forms\Builders\PersonAssoForm;
use App\Models\PersonAsso;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(PersonAsso $personAsso, PersonAssoForm $form)
    {
        return ['form' => $form->edit($personAsso)];
    }
}
