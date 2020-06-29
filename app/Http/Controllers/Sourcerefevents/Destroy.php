<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\SourceRefEven;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(SourceRefEven $sourceRefEven)
    {
        $sourceRefEven->delete();

        return [
            'message' => __('The source ref even was successfully deleted'),
            'redirect' => 'sourcerefevents.index',
        ];
    }
}
