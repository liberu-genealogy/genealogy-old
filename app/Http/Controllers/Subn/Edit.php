<?php

namespace App\Http\Controllers\Subn;

use App\Forms\Builders\SubnForm;
use App\Models\Subn;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Subn $subn, SubnForm $form)
    {
        return ['form' => $form->edit($subn)];
    }
}
