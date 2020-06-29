<?php

namespace App\Http\Controllers\Personevent;

use App\PersonEvent;
use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonEventForm;

class Edit extends Controller
{
    public function __invoke(PersonEvent $personEvent, PersonEventForm $form)
    {
        return ['form' => $form->edit($personEvent)];
    }
}
