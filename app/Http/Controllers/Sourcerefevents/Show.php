<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\SourceRefEven;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(SourceRefEven $sourceRefEven)
    {
        return ['sourceRefEven' => $sourceRefEven];
    }
}
