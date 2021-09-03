<?php

namespace App\Http\Controllers\Refn;

use App\Models\Refn;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Refn $refn)
    {
        $refn->delete();

        return [
            'message' => __('The refn was successfully deleted'),
            'redirect' => 'refn.index',
        ];
    }
}
