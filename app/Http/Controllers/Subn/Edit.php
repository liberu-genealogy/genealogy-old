<?php

namespace App\Http\Controllers\Subn;

use App\Subn;
use Illuminate\Routing\Controller;
use App\Forms\Builders\SubnForm;

class Edit extends Controller
{
    public function __invoke(Subn $subn, SubnForm $form)
    {
        return ['form' => $form->edit($subn)];
    }
}
