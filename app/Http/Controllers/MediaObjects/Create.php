<?php

namespace App\Http\Controllers\MediaObjects;

use App\Forms\Builders\MediaObjectForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(MediaObjectForm $form)
    {
        return ['form' => $form->create()];
    }
}
