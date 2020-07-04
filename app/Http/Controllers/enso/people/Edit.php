<?php

namespace App\Http\Controllers\enso\people;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonForm;
use App\Person;

class Edit extends Controller
{
    public function __invoke(Person $person, PersonForm $form)
    {
        return ['form' => $form->edit($person)];
    }
}
