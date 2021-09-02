<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Models\SourceRefEven;
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
