<?php

namespace App\Http\Controllers\Families;

use App\Family;
use Illuminate\Routing\Controller;
use App\Forms\Builders\FamilyForm;

class Edit extends Controller
{
    public function __invoke(Family $family, FamilyForm $form)
    {
        return ['form' => $form->edit($family)];
    }
}
