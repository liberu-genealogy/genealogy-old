<?php

namespace App\Http\Controllers\Addresses;

use App\Addr;
use Illuminate\Routing\Controller;
use App\Forms\Builders\AddrForm;

class Edit extends Controller
{
    public function __invoke(Addr $addr, AddrForm $form)
    {
        return ['form' => $form->edit($addr)];
    }
}
