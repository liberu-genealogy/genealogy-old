<?php

namespace App\Http\Controllers\Personanci;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonAnciForm;

class Create extends Controller
{
    public function __invoke(PersonAnciForm $form)
    {
        return ['form' => $form->create()];
    }
}
