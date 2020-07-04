<?php

namespace App\Http\Controllers\Familyslugs;

use App\FamilySlgs;
use App\Forms\Builders\FamilySlgsForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(FamilySlgs $familySlgs, FamilySlgsForm $form)
    {
        return ['form' => $form->edit($familySlgs)];
    }
}
