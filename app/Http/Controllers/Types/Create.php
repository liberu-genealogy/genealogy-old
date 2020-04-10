<?php

namespace App\Http\Controllers\Types;

use Illuminate\Routing\Controller;
use App\Forms\Builders\TypeForm;

class Create extends Controller
{
    public function __invoke(TypeForm $form)
    {
        return ['form' => $form->create()];
    }
}
