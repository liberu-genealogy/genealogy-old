<?php

namespace App\Http\Controllers\enso\Roles;

use App\Forms\Builders\enso\Roles\RoleForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(RoleForm $form)
    {
        return ['form' => $form->create()];
    }
}
