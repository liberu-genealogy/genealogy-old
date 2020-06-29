<?php

namespace App\Http\Controllers\Sourcerefevents;

use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceRefEvenForm;

class Create extends Controller
{
    public function __invoke(SourceRefEvenForm $form)
    {
        return ['form' => $form->create()];
    }
}
