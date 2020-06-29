<?php

namespace App\Http\Controllers\Personevent;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonEventForm;

class Create extends Controller
{
    public function __invoke(PersonEventForm $form)
    {
        return ['form' => $form->create()];
    }
}
