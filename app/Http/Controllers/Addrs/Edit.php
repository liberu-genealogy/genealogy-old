<?php

namespace App\Http\Controllers\Addrs;

use App\Addr;
use App\Forms\Builders\AddrForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Addr $addr, AddrForm $form)
    {
        return ['form' => $form->edit($addr)];
    }
}
