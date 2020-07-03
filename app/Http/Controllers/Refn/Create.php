<?php

namespace App\Http\Controllers\Refn;

use App\Forms\Builders\RefnForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(RefnForm $form)
    {
        return ['form' => $form->create()];
    }
}
