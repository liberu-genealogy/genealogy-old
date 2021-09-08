<?php

namespace App\Http\Controllers\Users;

use App\Forms\Builders\UserForm;
use App\Models\Person;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(Person $person, UserForm $form)
    {
        return ['form' => $form->create($person)];
    }
}
