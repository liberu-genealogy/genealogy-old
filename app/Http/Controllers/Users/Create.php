<?php

namespace App\Http\Controllers\Users;

use App\Forms\Builders\UserForm;
use App\Models\Person;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(Person $person, UserForm $form)
    {
        $role = \Auth::user()->role_id;
        // $user_id = \Auth::user()->id;
        if (in_array($role, [1, 2])) {
            return ['form' => $form->create($person)];
        }
    }
}
