<?php

namespace App\Http\Controllers\Subm;

use App\Forms\Builders\SubmForm;
use App\Subm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Subm $subm, SubmForm $form)
    {
        return ['form' => $form->edit($subm)];
    }
}
