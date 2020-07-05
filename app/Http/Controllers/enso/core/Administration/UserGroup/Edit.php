<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use App\Forms\Builders\enso\core\UserGroupForm;
use App\Models\enso\core\UserGroup;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(UserGroup $userGroup, UserGroupForm $form)
    {
        return ['form' => $form->edit($userGroup)];
    }
}
