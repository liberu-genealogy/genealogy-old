<?php

namespace App\Http\Controllers\Person;

use App\Forms\Builders\PersonForm;
use App\Models\Person;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Person $person, PersonForm $form)
    {
        return ['form' => $form->edit($person)];
    }
}
