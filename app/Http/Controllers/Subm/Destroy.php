<?php

namespace App\Http\Controllers\Subm;

use App\Models\Subm;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Subm $subm)
    {
        $subm->delete();

        return [
            'message' => __('The subm was successfully deleted'),
            'redirect' => 'subm.index',
        ];
    }
}
