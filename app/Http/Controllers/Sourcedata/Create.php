<?php

namespace App\Http\Controllers\Sourcedata;

use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceDataForm;

class Create extends Controller
{
    public function __invoke(SourceDataForm $form)
    {
        return ['form' => $form->create()];
    }
}
