<?php

namespace App\Http\Controllers\Subm;

use Illuminate\Routing\Controller;
use App\Forms\Builders\SubmForm;

class Create extends Controller
{
    public function __invoke(SubmForm $form)
    {
        return ['form' => $form->create()];
    }
}
