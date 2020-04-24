<?php

namespace App\Http\Controllers\Sources;

use App\Forms\Builders\SourceForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(SourceForm $form)
    {
        return ['form' => $form->create()];
    }
}
