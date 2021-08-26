<?php

namespace App\Http\Controllers\Addrs;

use App\Models\Addr;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Addr $addr)
    {
        $addr->delete();

        return [
            'message' => __('The addr was successfully deleted'),
            'redirect' => 'addresses.index',
        ];
    }
}
