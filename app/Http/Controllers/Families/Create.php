<?php

namespace App\Http\Controllers\Families;

use Illuminate\Routing\Controller;
use App\Forms\Builders\FamilyForm;

class Create extends Controller
{
    public function __invoke(FamilyForm $form)
    {
        return ['form' => $form->create()];
    }
}
