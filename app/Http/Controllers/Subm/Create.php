<?php

namespace App\Http\Controllers\Subm;

use App\Forms\Builders\SubmForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(SubmForm $form)
    {
        return ['form' => $form->create()];
    }
}
