<?php

namespace App\Http\Controllers\Sources;

use App\Models\Source;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Source $source)
    {
        $source->delete();

        return [
            'message' => __('The source was successfully deleted'),
            'redirect' => 'sources.index',
        ];
    }
}
