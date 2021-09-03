<?php

namespace App\Http\Controllers\Personevent;

use App\Forms\Builders\PersonEventForm;
use App\Models\PersonEvent;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(PersonEvent $personEvent, PersonEventForm $form)
    {
        return ['form' => $form->edit($personEvent)];
    }
}
