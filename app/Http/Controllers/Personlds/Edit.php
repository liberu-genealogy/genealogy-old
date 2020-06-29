<?php

namespace App\Http\Controllers\Personlds;

use App\PersonLds;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonLdsForm;

class Edit extends Controller
{
    public function __invoke(PersonLds $personLds, PersonLdsForm $form)
    {
        return ['form' => $form->edit($personLds)];
    }
}
