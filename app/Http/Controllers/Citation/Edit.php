<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use Illuminate\Routing\Controller;
use App\Forms\Builders\citationForm;

class Edit extends Controller
{
    public function __invoke(Citation $citation, citationForm $form)
    {
        return ['form' => $form->edit($citation)];
    }
}
