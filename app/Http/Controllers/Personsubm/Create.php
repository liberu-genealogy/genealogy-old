<?php

namespace App\Http\Controllers\Personsubm;

use App\Forms\Builders\PersonSubmForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonSubmForm $form)
    {
        return ['form' => $form->create()];
    }
}
