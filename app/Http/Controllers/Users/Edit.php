<?php

namespace App\Http\Controllers\Users;

use App\Forms\Builders\UserForm;
use App\Models\User;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(User $user, UserForm $form)
    {
        $role = \Auth::user()->role_id;
        // $user_id = \Auth::user()->id;
        if (in_array($role, [1, 2])) {
            return ['form' => $form->edit($user)];
        }

        return ['error' => __('Unauthorized')];
    }
}
