<?php

namespace App\Http\Controllers\Families;

use App\Forms\Builders\FamilyForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(FamilyForm $form)
    {
        return ['form' => $form->create()];
    }
}
