<?php

namespace App\Http\Controllers\Families;

use App\Forms\Builders\FamilyForm;
use App\Models\Family;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke($family, FamilyForm $form)
    {
        $family = Family::find($family);

        return ['form' => $form->edit($family)];
    }
}
