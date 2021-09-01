<?php

namespace App\Http\Controllers\Chan;

use App\Models\Chan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Index extends Controller
{
    public function __invoke(Request $request, Chan $chan)
    {
        return ['chans' => $chan];
    }
}
