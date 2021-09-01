<?php

namespace App\Http\Controllers\Citations;

use App\Models\Citation;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Citation $citation)
    {
        $citation->delete();

        return [
            'message' => __('The citation was successfully deleted'),
            'redirect' => 'citations.index',
        ];
    }
}
