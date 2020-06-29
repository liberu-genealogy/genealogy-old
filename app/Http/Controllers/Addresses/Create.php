<?php

namespace App\Http\Controllers\Addresses;

use Illuminate\Routing\Controller;
use App\Forms\Builders\AddrForm;

class Create extends Controller
{
    public function __invoke(AddrForm $form)
    {
        return ['form' => $form->create()];
    }
}
