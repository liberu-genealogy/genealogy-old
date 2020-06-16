<?php

namespace App\Http\Controllers\MediaObjects;

use Illuminate\Routing\Controller;
use App\Forms\Builders\MediaObjectForm;

class Create extends Controller
{
    public function __invoke(MediaObjectForm $form)
    {
        return ['form' => $form->create()];
    }
}
