<?php

namespace App\Http\Controllers\Refn;

use App\Forms\Builders\RefnForm;
use App\Models\Refn;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Refn $refn, RefnForm $form)
    {
        return ['form' => $form->edit($refn)];
    }
}
