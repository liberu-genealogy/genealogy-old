<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Tutorials\TutorialForm;

class Create extends Controller
{
    public function __invoke(TutorialForm $form)
    {
        return ['form' => $form->create()];
    }
}
