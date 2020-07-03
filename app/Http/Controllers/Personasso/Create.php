<?php

namespace App\Http\Controllers\Personasso;

use App\Forms\Builders\PersonAssoForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonAssoForm $form)
    {
        return ['form' => $form->create()];
    }
}
