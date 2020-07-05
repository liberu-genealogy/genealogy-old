<?php

namespace App\Http\Controllers\enso\files\File;

use App\Models\enso\files\File;
use Illuminate\Routing\Controller;

class Share extends Controller
{
    //
    public function __invoke(File $file)
    {
        return $file->attachable->download();
    }
}
