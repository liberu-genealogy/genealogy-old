<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\SourceDataEven;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(SourceDataEven $sourceDataEven)
    {
        $sourceDataEven->delete();

        return [
            'message' => __('The source data even was successfully deleted'),
            'redirect' => 'sourcedataevent.index',
        ];
    }
}
