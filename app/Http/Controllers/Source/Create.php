<?php

namespace App\Http\Controllers\Source;

use Illuminate\Routing\Controller;
use App\Forms\Builders\sourceForm;

class Create extends Controller
{
    public function __invoke(sourceForm $form)
    {
        return ['form' => $form->create()];
    }
}
