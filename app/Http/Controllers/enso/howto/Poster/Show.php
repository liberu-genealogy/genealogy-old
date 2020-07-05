<?php

namespace App\Http\Controllers\enso\HowTo\Poster;

use Illuminate\Routing\Controller;
use App\Models\enso\howto\Poster;

class Show extends Controller
{
    public function __invoke(Poster $poster)
    {
        return $poster->inline();
    }
}
