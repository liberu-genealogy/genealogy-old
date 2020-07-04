<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use App\Forms\Builders\enso\core\UserForm;
use App\Models\User;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(User $user, UserForm $form)
    {
        return ['form' => $form->edit($user)];
    }
}
