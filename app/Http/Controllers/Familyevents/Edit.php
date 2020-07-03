<?php

namespace App\Http\Controllers\Familyevents;

use App\FamilyEvent;
use App\Forms\Builders\FamilyEventForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(FamilyEvent $familyEvent, FamilyEventForm $form)
    {
        return ['form' => $form->edit($familyEvent)];
    }
}
