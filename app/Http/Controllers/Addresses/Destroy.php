<?php

namespace App\Http\Controllers\Addresses;

use App\Addr;
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
