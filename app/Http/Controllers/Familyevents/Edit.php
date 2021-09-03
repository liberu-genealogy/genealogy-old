<?php

namespace App\Http\Controllers\Familyevents;

use App\Forms\Builders\FamilyEventForm;
use App\Models\FamilyEvent;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(FamilyEvent $familyEvent, FamilyEventForm $form)
    {
        return ['form' => $form->edit($familyEvent)];
    }
}
