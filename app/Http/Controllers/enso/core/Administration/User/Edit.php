<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\core\UserForm;
use App\Models\User;

class Edit extends Controller
{
    public function __invoke(User $user, UserForm $form)
    {
        return ['form' => $form->edit($user)];
    }
}
