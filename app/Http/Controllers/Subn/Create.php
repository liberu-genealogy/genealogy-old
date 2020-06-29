<?php

namespace App\Http\Controllers\Subn;

use Illuminate\Routing\Controller;
use App\Forms\Builders\SubnForm;

class Create extends Controller
{
    public function __invoke(SubnForm $form)
    {
        return ['form' => $form->create()];
    }
}
