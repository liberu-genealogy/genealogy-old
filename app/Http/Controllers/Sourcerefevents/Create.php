<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\Forms\Builders\SourceRefEvenForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(SourceRefEvenForm $form)
    {
        return ['form' => $form->create()];
    }
}
