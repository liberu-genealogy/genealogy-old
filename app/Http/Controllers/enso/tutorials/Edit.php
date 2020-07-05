<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use App\Models\enso\Tutorials\Tutorial;
use App\Forms\Builders\enso\Tutorials\TutorialForm;

class Edit extends Controller
{
    public function __invoke(Tutorial $tutorial, TutorialForm $form)
    {
        return ['form' => $form->edit($tutorial)];
    }
}
