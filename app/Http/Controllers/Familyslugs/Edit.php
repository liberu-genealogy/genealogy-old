<?php

namespace App\Http\Controllers\Familyslugs;

use App\Forms\Builders\FamilySlgsForm;
use App\Models\FamilySlgs;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(FamilySlgs $familySlgs, FamilySlgsForm $form)
    {
        return ['form' => $form->edit($familySlgs)];
    }
}
