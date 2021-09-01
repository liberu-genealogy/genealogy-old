<?php

namespace App\Http\Controllers\Citations;

use App\Models\Citation;
use App\Forms\Builders\CitationForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Citation $citation, CitationForm $form)
    {
        return ['form' => $form->edit($citation)];
    }
}
