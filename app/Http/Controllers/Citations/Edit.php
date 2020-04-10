<?php

namespace App\Http\Controllers\Citations;

use App\Citation;
use Illuminate\Routing\Controller;
use App\Forms\Builders\CitationForm;

class Edit extends Controller
{
    public function __invoke(Citation $citation, CitationForm $form)
    {
        return ['form' => $form->edit($citation)];
    }
}
