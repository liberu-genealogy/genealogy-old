<?php

namespace App\Http\Controllers\Addrs;

use App\Models\Addr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke(Request $request, Addr $addr)
    {
        return ['addrs' => $addr];
    }
}
