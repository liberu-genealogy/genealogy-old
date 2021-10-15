<?php

namespace App\Http\Controllers\Dna;

use App\Forms\Builders\DnaForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(DnaForm $form)
    {
        return ['form' => $form->create()];
    }
}
