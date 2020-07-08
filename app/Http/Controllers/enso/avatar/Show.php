<?php

namespace App\Http\Controllers\enso\Avatars;

use Illuminate\Routing\Controller;
use App\Models\enso\Avatars\Avatar;

class Show extends Controller
{
    public function __invoke(Avatar $avatar)
    {
        return $avatar->inline();
    }
}
