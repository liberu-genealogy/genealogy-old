<?php

namespace App\Http\Controllers\Personevent;

use App\Forms\Builders\PersonEventForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(PersonEventForm $form)
    {
        return ['form' => $form->create()];
    }
}
