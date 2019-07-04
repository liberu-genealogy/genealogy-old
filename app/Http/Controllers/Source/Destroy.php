<?php

namespace App\Http\Controllers\Source;

use App\source;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(source $source)
    {
        $source->delete();

        return [
            'message' => __('The source was successfully deleted'),
            'redirect' => 'source.index',
        ];
    }
}
