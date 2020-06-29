<?php

namespace App\Http\Controllers\Familyslugs;

use App\FamilySlgs;
use Illuminate\Routing\Controller;
use App\Forms\Builders\FamilySlgsForm;

class Edit extends Controller
{
    public function __invoke(FamilySlgs $familySlgs, FamilySlgsForm $form)
    {
        return ['form' => $form->edit($familySlgs)];
    }
}
