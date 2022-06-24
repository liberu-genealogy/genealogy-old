<?php

namespace App\Http\Controllers\Person;

use App\Forms\Builders\PersonForm;
use App\Models\Person;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonForm $form)
    {
        return ['form' => $form->create()];
    }
}
