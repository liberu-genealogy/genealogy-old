<?php

namespace App\Http\Controllers\Sourcedata;

use App\Forms\Builders\SourceDataForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(SourceDataForm $form)
    {
        return ['form' => $form->create()];
    }
}
