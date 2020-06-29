<?php

namespace App\Http\Controllers\Subm;

use App\Subm;
use Illuminate\Routing\Controller;
use App\Forms\Builders\SubmForm;

class Edit extends Controller
{
    public function __invoke(Subm $subm, SubmForm $form)
    {
        return ['form' => $form->edit($subm)];
    }
}
