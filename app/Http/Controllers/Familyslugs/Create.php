<?php

namespace App\Http\Controllers\Familyslugs;

use App\Forms\Builders\FamilySlgsForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(FamilySlgsForm $form)
    {
        return ['form' => $form->create()];
    }
}
