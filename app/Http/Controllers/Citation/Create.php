<?php

namespace App\Http\Controllers\Citation;

use Illuminate\Routing\Controller;
use App\Forms\Builders\citationForm;

class Create extends Controller
{
    public function __invoke(citationForm $form)
    {
        return ['form' => $form->create()];
    }
}
