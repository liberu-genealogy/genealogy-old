<?php

namespace App\Http\Controllers\Chan;

use App\Models\Chan;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Chan $chan)
    {
        $chan->delete();

        return [
            'message' => __('The chan was successfully deleted'),
            'redirect' => 'chan.index',
        ];
    }
}
