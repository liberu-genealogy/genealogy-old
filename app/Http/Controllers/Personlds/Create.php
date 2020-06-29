<?php

namespace App\Http\Controllers\Personlds;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonLdsForm;

class Create extends Controller
{
    public function __invoke(PersonLdsForm $form)
    {
        return ['form' => $form->create()];
    }
}
