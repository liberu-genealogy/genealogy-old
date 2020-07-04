<?php

namespace App\Http\Controllers\enso\Permissions;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Permissions\PermissionForm;

class Create extends Controller
{
    public function __invoke(PermissionForm $form)
    {
        return ['form' => $form->create()];
    }
}
