<?php

namespace App\Http\Controllers\Chan;

use App\Models\Chan;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Chan $chan)
    {
        return ['chan' => $chan];
    }
}
