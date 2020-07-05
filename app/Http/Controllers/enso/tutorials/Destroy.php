<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use App\Models\enso\Tutorials\Tutorial;

class Destroy extends Controller
{
    public function __invoke(Tutorial $tutorial)
    {
        $tutorial->delete();

        return [
            'message' => __('The tutorial was successfully deleted'),
            'redirect' => 'system.tutorials.index',
        ];
    }
}
