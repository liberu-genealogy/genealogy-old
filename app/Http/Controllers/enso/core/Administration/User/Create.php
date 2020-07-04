<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\core\UserForm;
use App\Person;

class Create extends Controller
{
    public function __invoke(Person $person, UserForm $form)
    {
        return ['form' => $form->create($person)];
    }
}
