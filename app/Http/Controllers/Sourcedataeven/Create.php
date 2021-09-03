<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Forms\Builders\SourceDataEvenForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(SourceDataEvenForm $form)
    {
        return ['form' => $form->create()];
    }
}
