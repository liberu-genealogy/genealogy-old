<?php

namespace App\Http\Controllers\Refn;

use Illuminate\Routing\Controller;
use App\Forms\Builders\RefnForm;

class Create extends Controller
{
    public function __invoke(RefnForm $form)
    {
        return ['form' => $form->create()];
    }
}
