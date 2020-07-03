<?php

namespace App\Http\Controllers\Personlds;

use App\Forms\Builders\PersonLdsForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonLdsForm $form)
    {
        return ['form' => $form->create()];
    }
}
