<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Citation $citation)
    {
        $citation->delete();

        return [
            'message' => __('The citation was successfully deleted'),
            'redirect' => 'citation.index',
        ];
    }
}
