<?php

namespace App\Http\Controllers\Subn;

use App\Forms\Builders\SubnForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(SubnForm $form)
    {
        return ['form' => $form->create()];
    }
}
