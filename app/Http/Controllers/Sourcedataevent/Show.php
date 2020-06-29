<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\SourceDataEven;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(SourceDataEven $sourceDataEven)
    {
        return ['sourceDataEven' => $sourceDataEven];
    }
}
