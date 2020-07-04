<?php

namespace App\Http\Controllers\enso\files\Upload;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\enso\files\Upload;

class Store extends Controller
{
    public function __invoke(Request $request, Upload $upload)
    {
        return $upload->store($request->allFiles());
    }
}
