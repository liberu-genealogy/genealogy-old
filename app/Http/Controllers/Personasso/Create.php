<?php

namespace App\Http\Controllers\Personasso;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonAssoForm;

class Create extends Controller
{
    public function __invoke(PersonAssoForm $form)
    {
        return ['form' => $form->create()];
    }
}
