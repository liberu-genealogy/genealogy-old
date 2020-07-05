<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use App\Http\Response\enso\Tutorials\Index;

class Load extends Controller
{
    public function __invoke()
    {
        return new Index();
    }
}
