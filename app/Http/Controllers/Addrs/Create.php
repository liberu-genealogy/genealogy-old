<?php

namespace App\Http\Controllers\Addrs;

use App\Forms\Builders\AddrForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(AddrForm $form)
    {
        return ['form' => $form->create()];
    }
}
