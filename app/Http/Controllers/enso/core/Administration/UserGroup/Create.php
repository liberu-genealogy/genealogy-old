<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use Illuminate\Routing\Controller;
use LaravelEnso\Core\Forms\Builders\UserGroupForm;

class Create extends Controller
{
    public function __invoke(UserGroupForm $form)
    {
        return ['form' => $form->create()];
    }
}
