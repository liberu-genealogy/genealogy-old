<?php

namespace App\Http\Controllers\Types;

use App\Forms\Builders\TypeForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(TypeForm $form)
    {
        return ['form' => $form->create()];
    }
}
