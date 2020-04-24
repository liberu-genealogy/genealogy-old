<?php

namespace App\Http\Controllers\Citations;

use App\Forms\Builders\CitationForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(CitationForm $form)
    {
        return ['form' => $form->create()];
    }
}
