<?php

namespace App\Http\Controllers\Personanci;

use App\Forms\Builders\PersonAnciForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonAnciForm $form)
    {
        return ['form' => $form->create()];
    }
}
