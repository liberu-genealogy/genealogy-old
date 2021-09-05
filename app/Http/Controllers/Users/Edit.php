<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use App\Forms\Builders\UserForm;
use App\Models\User;

class Edit extends Controller
{
    public function __invoke(User $user, UserForm $form)
    {
        return ['form' => $form->edit($user)];
    }
}
