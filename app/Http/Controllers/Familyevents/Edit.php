<?php

namespace App\Http\Controllers\Familyevents;

use App\FamilyEvent;
use Illuminate\Routing\Controller;
use App\Forms\Builders\FamilyEventForm;

class Edit extends Controller
{
    public function __invoke(FamilyEvent $familyEvent, FamilyEventForm $form)
    {
        return ['form' => $form->edit($familyEvent)];
    }
}
