<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Models\SourceDataEven;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(SourceDataEven $soucedataeven)
    {
        $soucedataeven->delete();

        return [
            'message' => __('The source data even was successfully deleted'),
            'redirect' => 'sourcedataeven.index',
        ];
    }
}
