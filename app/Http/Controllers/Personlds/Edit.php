<?php

namespace App\Http\Controllers\Personlds;

use App\Forms\Builders\PersonLdsForm;
use App\Models\PersonLds;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(PersonLds $personLds, PersonLdsForm $form)
    {
        return ['form' => $form->edit($personLds)];
    }
}
