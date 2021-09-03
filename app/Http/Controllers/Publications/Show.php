<?php

namespace App\Http\Controllers\Publications;

use App\Models\Publication;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Publication $publication)
    {
        return ['publication' => $publication];
    }
}
