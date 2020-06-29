<?php

namespace App\Http\Controllers\Familyevents;

use Illuminate\Routing\Controller;
use App\Forms\Builders\FamilyEventForm;

class Create extends Controller
{
    public function __invoke(FamilyEventForm $form)
    {
        return ['form' => $form->create()];
    }
}
