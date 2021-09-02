<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Models\SourceDataEven;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(SourceDataEven $sourceDataEven)
    {
        return ['sourcedataeven' => $sourceDataEven];
    }
}
