<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use App\Models\Person;
use App\Forms\Builders\UserForm;

class Create extends Controller
{
    public function __invoke(Person $person, UserForm $form)
    {
        return ['form' => $form->create($person)];
    }
}
