<?php

namespace App\Http\Controllers\Users;

use App\Forms\Builders\UserForm;
use App\Models\User;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(User $user, UserForm $form)
    {
        return ['form' => $form->edit($user)];
    }
}
