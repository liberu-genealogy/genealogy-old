<?php

namespace App\Http\Controllers\Refn;

use App\Refn;
use Illuminate\Routing\Controller;
use App\Forms\Builders\RefnForm;

class Edit extends Controller
{
    public function __invoke(Refn $refn, RefnForm $form)
    {
        return ['form' => $form->edit($refn)];
    }
}
