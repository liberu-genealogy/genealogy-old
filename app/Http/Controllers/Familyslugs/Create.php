<?php

namespace App\Http\Controllers\Familyslugs;

use Illuminate\Routing\Controller;
use App\Forms\Builders\FamilySlgsForm;

class Create extends Controller
{
    public function __invoke(FamilySlgsForm $form)
    {
        return ['form' => $form->create()];
    }
}
