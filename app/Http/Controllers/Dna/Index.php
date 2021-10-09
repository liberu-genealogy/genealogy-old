<?php

namespace App\Http\Controllers\Addrs;

use App\Http\Controllers\Controller;
use App\Models\Addr;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke(Request $request, Addr $addr)
    {
        return ['addrs' => $addr];
    }
}
