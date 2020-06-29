<?php

namespace App\Http\Controllers\Chan;

use Illuminate\Routing\Controller;
use App\Forms\Builders\ChanForm;

class Create extends Controller
{
    public function __invoke(ChanForm $form)
    {
        return ['form' => $form->create()];
    }
}
