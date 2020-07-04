<?php

namespace App\Http\Controllers\enso\Roles;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Roles\RoleForm;

class Create extends Controller
{
    public function __invoke(RoleForm $form)
    {
        return ['form' => $form->create()];
    }
}
