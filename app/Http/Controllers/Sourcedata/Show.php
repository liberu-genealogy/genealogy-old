<?php

namespace App\Http\Controllers\Sourcedata;

use App\SourceData;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(SourceData $sourceData)
    {
        return ['sourceData' => $sourceData];
    }
}
