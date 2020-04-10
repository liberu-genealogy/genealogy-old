<?php

namespace App\Http\Controllers\Sources;

use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceForm;

class Create extends Controller
{
    public function __invoke(SourceForm $form)
    {
        return ['form' => $form->create()];
    }
}
