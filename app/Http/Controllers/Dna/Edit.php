<?php

namespace App\Http\Controllers\Addrs;

use App\Forms\Builders\AddrForm;
use App\Models\Addr;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Addr $addr, AddrForm $form)
    {
        return ['form' => $form->edit($addr)];
    }
}
