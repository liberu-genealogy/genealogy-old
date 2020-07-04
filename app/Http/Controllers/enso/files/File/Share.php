<?php

namespace App\Http\Controllers\enso\files\File;

use Illuminate\Routing\Controller;
use App\Models\enso\files\File;

class Share extends Controller
{
    //
    public function __invoke(File $file)
    {
        return $file->attachable->download();
    }    
}
