<?php

namespace App\Http\Controllers\enso\files\File;

use App\Http\Response\enso\files\Files;
use Illuminate\Routing\Controller;

class Index extends Controller
{
    public function __invoke()
    {
        return new Files();
    }
}
