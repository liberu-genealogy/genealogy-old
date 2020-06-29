<?php

namespace App\Http\Controllers\Sourcedata;

use App\SourceData;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(SourceData $sourceData)
    {
        $sourceData->delete();

        return [
            'message' => __('The source data was successfully deleted'),
            'redirect' => 'sourcedata.index',
        ];
    }
}
