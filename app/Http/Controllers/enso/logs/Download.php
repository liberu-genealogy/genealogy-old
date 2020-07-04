<?php

namespace App\Http\Controllers\enso\Logs;

use Illuminate\Routing\Controller;

class Download extends Controller
{
    public function __invoke($filename)
    {
        $headers = ['Content-Type: application/log'];

        return response()->download(
            storage_path("logs/{$filename}"), $filename, $headers
        );
    }
}
