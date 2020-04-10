<?php

namespace App\Http\Controllers\Types;

use App\Type;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Type $type)
    {
        return ['type' => $type];
    }
}
