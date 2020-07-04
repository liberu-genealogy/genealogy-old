<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use App\Forms\Builders\enso\core\UserForm;
use App\Person;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(Person $person, UserForm $form)
    {
        return ['form' => $form->create($person)];
    }
}
