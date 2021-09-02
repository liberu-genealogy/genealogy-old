<?php

namespace App\Http\Controllers\Families;

use App\Models\Family;
use App\Forms\Builders\FamilyForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Family $family, FamilyForm $form)
    {
        return ['form' => $form->edit($family)];
    }
}
