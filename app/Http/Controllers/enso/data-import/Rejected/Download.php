<?php

namespace App\Http\Controllers\enso\dataimport\Rejected;

use Illuminate\Routing\Controller;
use App\Models\enso\dataimport\RejectedImport;

class Download extends Controller
{
    public function __invoke(RejectedImport $rejectedImport)
    {
        return $rejectedImport->download();
    }
}
