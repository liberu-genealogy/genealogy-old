<?php

namespace App\Http\Controllers\enso\files\File;

use Illuminate\Routing\Controller;
use App\Http\Response\enso\files\Files;

class Index extends Controller
{
    public function __invoke()
    {
        return new Files();
    }
}
