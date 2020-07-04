<?php

namespace App\Http\Controllers\Chan;

use App\Forms\Builders\ChanForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(ChanForm $form)
    {
        return ['form' => $form->create()];
    }
}
