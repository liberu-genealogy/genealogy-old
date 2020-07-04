<?php

namespace App\Http\Controllers\enso\permissions;

use App\Forms\Builders\enso\permissions\PermissionForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PermissionForm $form)
    {
        return ['form' => $form->create()];
    }
}
