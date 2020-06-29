<?php

namespace App\Http\Controllers\Personsubm;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonSubmForm;

class Create extends Controller
{
    public function __invoke(PersonSubmForm $form)
    {
        return ['form' => $form->create()];
    }
}
