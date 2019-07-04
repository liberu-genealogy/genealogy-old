<?php

namespace App\Http\Controllers\Source;

use App\Forms\Builders\sourceForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(sourceForm $form)
    {
        return ['form' => $form->create()];
    }
}
