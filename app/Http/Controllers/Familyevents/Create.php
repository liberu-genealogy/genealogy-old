<?php

namespace App\Http\Controllers\Familyevents;

use App\Forms\Builders\FamilyEventForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(FamilyEventForm $form)
    {
        return ['form' => $form->create()];
    }
}
