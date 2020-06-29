<?php

namespace App\Http\Controllers\Sourcedataevent;

use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceDataEvenForm;

class Create extends Controller
{
    public function __invoke(SourceDataEvenForm $form)
    {
        return ['form' => $form->create()];
    }
}
