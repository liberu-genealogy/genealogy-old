<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Models\SourceRefEven;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(SourceRefEven $sourceRefEven)
    {
        return ['sourceRefEven' => $sourceRefEven];
    }
}
